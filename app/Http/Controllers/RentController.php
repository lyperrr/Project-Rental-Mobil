<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rent;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

class RentController extends Controller
{
    public function index()
    {
        $cars = Car::where('status', 'available')->paginate(12);
        return view('rent', compact('cars'), ['title' => __('messages.navbar.rent')]);
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('rent-detail', compact('car'), ['title' => $car->brand . ' ' . $car->model]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'pickup_date' => 'required|date|after_or_equal:' . now()->toDateString(),
            'dropoff_date' => 'required|date|after_or_equal:pickup_date',
            'pickup_time' => 'required',
            'dropoff_time' => 'required',
            'rental_type' => 'required|in:hours,days,weeks,month',
            'baby_seat' => 'nullable|boolean',
        ]);

        $car = Car::findOrFail($request->car_id);

        if ($car->status !== 'available') {
            return response()->json(['error' => 'This car is not available for rent.'], 400);
        }

        $user = Auth::user();
        if (!$user->userProfile || empty($user->userProfile->ktp_number)) {
            return response()->json([
                'error' => 'Please complete your profile before renting a car.',
                'redirect' => route('profile')
            ], 400);
        }

        $startDate = Carbon::parse($request->pickup_date . ' ' . $request->pickup_time, 'Asia/Makassar');
        $endDate = Carbon::parse($request->dropoff_date . ' ' . $request->dropoff_time, 'Asia/Makassar');

        if ($endDate->lessThanOrEqualTo($startDate)) {
            return response()->json(['error' => 'Dropoff must be after pickup time.'], 400);
        }

        $diffHours = $startDate->diffInHours($endDate);
        $durationDays = max(1, (int) ceil($diffHours / 24));
        $pricePerDay = intval($car->price_per_day);
        $totalPrice = $pricePerDay * $durationDays;

        $item_details = [[
            'id' => (string) $car->id,
            'price' => $pricePerDay,
            'quantity' => $durationDays,
            'name' => $car->brand . ' ' . $car->model,
        ]];

        if ($request->has('baby_seat') && $request->baby_seat) {
            $item_details[] = [
                'id' => 'BABY_SEAT',
                'price' => 150000,
                'quantity' => 1,
                'name' => 'Baby Seat',
            ];
            $totalPrice += 150000;
        }

        $totalPrice = intval($totalPrice);
        $order_id = 'RENT-' . strtoupper(uniqid());

        Log::info('Creating rental', [
            'car_id' => $car->id,
            'start' => $startDate,
            'end' => $endDate,
            'duration_hours' => $diffHours,
            'duration_days' => $durationDays,
            'price_per_day' => $pricePerDay,
            'baby_seat' => $request->baby_seat ?? false,
            'total' => $totalPrice,
        ]);

        $rental = Rent::create([
            'user_id' => $user->id,
            'order_id' => $order_id,
            'car_id' => $car->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $transaction_data = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $totalPrice,
            ],
            'item_details' => $item_details,
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->userProfile->phone ?? '',
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($transaction_data);

            Payment::create([
                'rental_id' => $rental->id,
                'amount' => $totalPrice,
                'order_id' => $order_id,
                'snap_token' => $snapToken,
                'transaction_status' => 'pending',
            ]);

            return response()->json([
                'rental_id' => $rental->id,
                'amount' => $totalPrice,
                'snap_token' => $snapToken,
                'success' => true,
            ]);
        } catch (\Exception $e) {
            Log::error('Payment creation failed: ' . $e->getMessage());
            return response()->json([
                'error' => 'Failed to create payment: ' . $e->getMessage(),
                'success' => false,
            ], 500);
        }
    }

    public function handleWebhook(Request $request)
    {
        try {
            Config::$serverKey = config('midtrans.server_key');
            Config::$isProduction = config('midtrans.is_production');
            Config::$isSanitized = config('midtrans.is_sanitized');
            Config::$is3ds = config('midtrans.is_3ds');

            Log::info('Webhook Raw Payload:', $request->all());

            $notif = new Notification();

            $transactionStatus = $notif->transaction_status;
            $orderId = $notif->order_id;
            $fraudStatus = $notif->fraud_status;
            $paymentType = $notif->payment_type;
            $transactionId = $notif->transaction_id;

            Log::debug('Webhook Parsed:', [
                'order_id' => $orderId,
                'transaction_status' => $transactionStatus,
                'fraud_status' => $fraudStatus,
                'payment_type' => $paymentType,
                'transaction_id' => $transactionId
            ]);

            $payment = Payment::where('order_id', $orderId)->first();
            if (!$payment) {
                Log::warning("Payment with order_id {$orderId} not found.");
                return response()->json(['error' => 'Order ID not found'], 404);
            }

            $rental = Rent::find($payment->rental_id);

            switch ($transactionStatus) {
                case 'capture':
                    $payment->transaction_status = ($fraudStatus == 'challenge') ? 'challenge' : 'success';
                    if ($payment->transaction_status === 'success' && $rental) {
                        $rental->status = 'completed';
                    }
                    break;

                case 'settlement':
                    $payment->transaction_status = 'success';
                    $payment->paid_at = now();
                    if ($rental) {
                        $rental->status = 'completed';
                    }
                    break;

                case 'pending':
                    $payment->transaction_status = 'pending';
                    if ($rental) {
                        $rental->status = 'pending';
                    }
                    break;

                case 'deny':
                case 'cancel':
                case 'expire':
                    $payment->transaction_status = $transactionStatus;
                    if ($rental) {
                        $rental->status = 'cancelled';
                    }
                    break;
            }

            $payment->save();
            if ($rental) $rental->save();

            if ($payment->transaction_status === 'success' && $rental) {
                $car = Car::find($rental->car_id);
                if ($car) {
                    $car->status = 'rented';
                    $car->save();
                }
            }

            return response()->json(['message' => 'Notification processed']);
        } catch (\Exception $e) {
            Log::error('Webhook Error: ' . $e->getMessage());
            return response()->json(['error' => 'Webhook failed'], 500);
        }
    }
}

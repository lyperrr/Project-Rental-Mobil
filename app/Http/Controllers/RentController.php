<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    public function index()
    {
        $cars = Car::where('status', 'available')->get();
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
            'pickup_date' => 'required|date|after_or_equal:today',
            'dropoff_date' => 'required|date|after_or_equal:pickup_date',
            'rental_type' => 'required|in:hours,days,weeks,month',
            'baby_seat' => 'nullable|boolean',
        ]);

        $car = Car::findOrFail($request->car_id);

        if ($car->status !== 'available') {
            return redirect()->back()->with('error', 'This car is not available for rent.');
        }

        $user = Auth::user();
        if (!$user->userProfile || empty($user->userProfile->identity_number)) {
            return redirect()->route('profile')->with('error', 'Please complete your profile before renting a car.');
        }

        $startDate = Carbon::parse($request->pickup_date . ' ' . $request->pickup_time);
        $endDate = Carbon::parse($request->dropoff_date . ' ' . $request->dropoff_time);

        // Calculate duration based on rental type
        $duration = match ($request->rental_type) {
            'hours' => $startDate->diffInHours($endDate),
            'days' => $startDate->diffInDays($endDate) + 1,
            'weeks' => ceil(($startDate->diffInDays($endDate) + 1) / 7),
            'month' => $startDate->diffInMonths($endDate) + 1,
            default => 1,
        };

        $pricePerUnit = match ($request->rental_type) {
            'hours' => $car->price_per_day / 24,
            'days' => $car->price_per_day,
            'weeks' => $car->price_per_day * 7 * 0.9, // 10% discount for weekly
            'month' => $car->price_per_day * 30 * 0.8, // 20% discount for monthly
            default => $car->price_per_day,
        };

        $totalPrice = $pricePerUnit * $duration;
        if ($request->baby_seat) {
            $totalPrice += 150000;
        }

        $rental = Rent::create([
            'user_id' => $user->id,
            'car_id' => $car->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        $car->update(['status' => 'rented']);

        return response()->json([
            'rental_id' => $rental->id,
            'amount' => $totalPrice,
        ]);
    }
}

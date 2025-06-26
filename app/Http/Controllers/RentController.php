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
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $car = Car::findOrFail($request->car_id);

        if ($car->status !== 'available') {
            return redirect()->back()->with('error', 'This car is not available for rent.');
        }

        $user = Auth::user();
        if (!$user->userProfile || empty($user->userProfile->identity_number)) {
            return redirect()->route('profile')->with('error', 'Please complete your profile before renting a car.');
        }

        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);
        $duration = $startDate->diffInDays($endDate) + 1;
        $totalPrice = $car->price_per_day * $duration;

        Rent::create([
            'user_id' => $user->id,
            'car_id' => $car->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        $car->update(['status' => 'rented']);

        return redirect()->route('cars.rent')->with('success', 'Rent request submitted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\Rent;
use Carbon\Carbon;
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
        return view('rent-detail', compact('car'));
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Ambil data mobil
        $car = Car::findOrFail($request->car_id);

        // Periksa apakah mobil tersedia
        if ($car->status !== 'available') {
            return redirect()->back()->with('error', 'This car is not available for rent.');
        }

        // Periksa apakah pengguna memiliki profil lengkap
        $user = Auth::user();
        if (!$user->userProfile || empty($user->userProfile->identity_number)) {
            return redirect()->route('profile')->with('error', 'Please complete your profile before renting a car.');
        }

        // Hitung total harga berdasarkan durasi sewa
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);
        $duration = $startDate->diffInDays($endDate) + 1; // Tambah 1 untuk inklusif
        $totalPrice = $car->price_per_day * $duration;

        // Simpan data penyewaan
        Rent::create([
            'user_id' => $user->id,
            'car_id' => $car->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        // Ubah status mobil menjadi rented
        $car->update(['status' => 'rented']);

        return redirect()->route('cars.rent')->with('success', 'Rent request submitted successfully.');
    }
}
?>
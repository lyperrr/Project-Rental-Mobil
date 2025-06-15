<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

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

    public function rent($id)
    {
        $car = Car::findOrFail($id);
        return view('rent-form', compact('car'), ['title' => 'Rent ' . $car->brand . ' ' . $car->model]);
    }
}
?>
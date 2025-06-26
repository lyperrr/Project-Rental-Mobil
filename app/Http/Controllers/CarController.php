<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function create()
    {
        return view('cars.create', ['title' => __('messages.navbar.add_car')]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'license_plate' => 'nullable|string|max:20|unique:cars,license_plate',
            'price_per_day' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
            'status' => 'required|in:available,rented,maintenance',
            'fuel_type' => 'nullable|in:petrol,diesel,electric,hybrid',
            'transmission' => 'nullable|in:manual,automatic,electric',
            'seats' => 'nullable|integer|min:1',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = file_get_contents($image->getRealPath());
        }

        Car::create($data);

        return redirect()->route('cars.home')->with('success', 'Car added successfully.');
    }
}

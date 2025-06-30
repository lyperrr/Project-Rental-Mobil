<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_rating' => 'required|numeric|min:1|max:5',
            'car_rating' => 'required|numeric|min:1|max:5',
            'website_rating' => 'required|numeric|min:1|max:5',
            'description' => 'required|string|max:1000',
        ]);

        $average = round((
            $validated['service_rating'] +
            $validated['car_rating'] +
            $validated['website_rating']
        ) / 3, 1);

        Review::create([
            'user_id' => auth()->check() ? auth()->id() : null,
            'title' => 'Ulasan oleh ' . (auth()->user()->name ?? 'Pengguna Anonim'),
            'description' => $validated['description'],
            'stars' => $average,
            'service_rating' => $validated['service_rating'],
            'car_rating' => $validated['car_rating'],
            'website_rating' => $validated['website_rating'],
        ]);

        return redirect()->back()->with('success', 'Review berhasil dikirim!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::where('status', 'available')->take(6)->get(); // Fetch up to 6 available cars for the homepage
        return view('home', compact('cars'), ['title' => __('messages.navbar.home')]);
    }
}
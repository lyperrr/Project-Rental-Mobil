<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'year',
        'license_plate',
        'price_per_day',
        'description',
        'image',
        'status',
        'fuel_type',
        'transmission',
        'seats',
        'renter_id', // New: ID of the user renting the car
        'start_date', // New: Rental start date
        'end_date', // New: Rental end date
        'total_price', // New: Total rental price
        'driver_license', // New: Driver's license number
        'additional_notes', // New: Additional notes
        'rental_status', // New: Rental status (pending, approved, etc.)
    ];

    protected $casts = [
        'status' => 'string',
        'fuel_type' => 'string',
        'transmission' => 'string',
        'year' => 'integer',
        'seats' => 'integer',
        'price_per_day' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
        'total_price' => 'decimal:2',
        'rental_status' => 'string',
    ];

    public function renter()
    {
        return $this->belongsTo(User::class, 'renter_id');
    }
}
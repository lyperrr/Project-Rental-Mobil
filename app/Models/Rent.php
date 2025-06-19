<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $table = 'rentals';

    protected $fillable = [
        'user_id',
        'car_id',
        'start_date',
        'end_date',
        'total_price',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'total_price' => 'decimal:2',
        'status' => 'string',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan model Car
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
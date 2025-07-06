<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'order_id',
    ];

    public $timestamps = false;

    // Relationship ke Car
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    // Relationship ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship ke Payment
    public function payment()
    {
        return $this->hasOne(Payment::class, 'rental_id');
    }
}

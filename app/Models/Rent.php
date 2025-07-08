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
<<<<<<< HEAD
        'snap_token',
        'transaction_id',
=======
        'order_id',
>>>>>>> cd727bf7584e6f62671a3213130f1d849ab9892a
    ];

    public $timestamps = false;

<<<<<<< HEAD
=======
    // Relationship ke Car
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    // Relationship ke User
>>>>>>> cd727bf7584e6f62671a3213130f1d849ab9892a
    public function user()
    {
        return $this->belongsTo(User::class);
    }

<<<<<<< HEAD
    public function car()
=======
    // Relationship ke Payment
    public function payment()
>>>>>>> cd727bf7584e6f62671a3213130f1d849ab9892a
    {
        return $this->hasOne(Payment::class, 'rental_id');
    }
}

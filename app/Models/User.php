<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'is_verified',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'created_at' => 'datetime',
    ];

    public function userProfile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rent::class);
    }

        public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}

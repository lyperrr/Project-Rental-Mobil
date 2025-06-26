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
    ];

    protected $casts = [
        'status' => 'string',
        'fuel_type' => 'string',
        'transmission' => 'string',
        'year' => 'integer',
    ];

    // Optional: Accessor to get the image as base64 for display
    public function getImageBase64Attribute()
    {
        if ($this->image) {
            return 'data:image/jpeg;base64,' . base64_encode($this->image);
        }
        return null;
    }
    
}

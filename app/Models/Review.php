<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'stars',
        'service_rating',
        'car_rating',
        'website_rating'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

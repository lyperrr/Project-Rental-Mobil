<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profiles';

    protected $fillable = [
        'user_id',
        'full_name',
        'phone',
        'photo_profile',
        'photo_profile_mime',
        'ktp_number',
        'sim_number',
        'ktp_image',
        'ktp_image_mime',
        'sim_image',
        'sim_image_mime',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPhotoProfileAttribute($value)
    {
        if ($value && $this->photo_profile_mime) {
            return 'data:' . $this->photo_profile_mime . ';base64,' . base64_encode($value);
        }
        return null;
    }

    public function getKtpImageAttribute($value)
    {
        if ($value && $this->ktp_image_mime) {
            return 'data:' . $this->ktp_image_mime . ';base64,' . base64_encode($value);
        }
        return null;
    }

    public function getSimImageAttribute($value)
    {
        if ($value && $this->sim_image_mime) {
            return 'data:' . $this->sim_image_mime . ';base64,' . base64_encode($value);
        }
        return null;
    }
}

<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Restaurant extends Authenticatable
{
    protected $table = 'restaurants';

    protected $fillable = [
        'restaurant_name',
        'restaurant_slug',
        'contact_first_name',
        'contact_last_name',
        'contact_phone',
        'contact_email',
        'password',
        'about_us',
        'short_about',
        'service_type',
        'status',
        'currency',
        'restaurant_type',
        'logo',
        'favicon',
        'feature_image',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}

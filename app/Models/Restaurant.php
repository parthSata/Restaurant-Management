<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Restaurant extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'restaurant-name',
        'restaurant-slug',
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

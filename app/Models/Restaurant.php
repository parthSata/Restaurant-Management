<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Restaurant extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'restaurant_name',
        'contact_first_name',
        'contact_last_name',
        'password',
        'service_type',
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $guard = 'seller'; 
    protected $hidden = ['password'];

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
        'feature_image'
    ];
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}

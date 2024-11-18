<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Authenticatable
{
    use HasFactory;

    // Define fillable fields for mass assignment
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

    // Define hidden fields to exclude from serialization
    protected $hidden = ['password', 'remember_token'];
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}

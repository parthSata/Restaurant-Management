<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Authenticatable
{
    use HasFactory;

    protected $guard_name = 'restaurant';


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
        'role',
    ];

    protected $hidden = ['password', 'remember_token'];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class, 'id');
    }
       
    public function restaurant()
    {
        return $this->hasMany(Restaurant::class);
    }
}

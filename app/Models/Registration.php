<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Registration extends Authenticatable
{
    use HasFactory;

    protected $table = 'registrations'; // This ensures Laravel uses the 'registrations' table
    protected $guard = 'web'; // Match the 'web' guard in auth.php
    protected $hidden = ['password'];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
    ];

    // Hash password before saving it in the database
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value); // Ensures the password is hashed
    }

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    // Relationship for orders
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }
}

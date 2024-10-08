<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Registration extends Authenticatable
{
    use HasFactory;

    protected $table = 'registrations'; // This ensures Laravel uses the 'registrations' table

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
}

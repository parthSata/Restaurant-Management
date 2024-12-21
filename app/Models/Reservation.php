<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservations';


    protected $fillable = [
        'title',
        'capacity',
        'image',
        'is_booked',
        'status',
    ];

    // Accessor to format 'is_booked' field
    public function getIsBookedAttribute($value)
    {
        return $value ? 'Booked' : 'Not Booked';
    }

    // Accessor for image path
    public function getImagePathAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('placeholder.svg');
    }

    // Query Scopes
    public function scopeBooked($query)
    {
        return $query->where('is_booked', true);
    }

    public function scopeAvailable($query)
    {
        return $query->where('is_booked', false);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class, 'reservation_id');
    }
}

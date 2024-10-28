<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantCouponcode extends Model
{
    use HasFactory;

    protected $fillable = [
        'coupon_name',
    'expiry_date',
    'coupon_type',
    'days_available',
    'discount',
    'min_order_amount',
    'coupon_option',
    'status',
    ];

    protected $casts = [
        'days_available' => 'array', // Casts 'days_available' as an array
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantCouponcode extends Model
{
    use HasFactory;

    protected $fillable = [
        'coupon_name',
        'coupon_type',
        'discount',
        'coupon_option',
        'min_order_amount',
        'expiry_date',
        'days_available',
        'status',
    ];
}

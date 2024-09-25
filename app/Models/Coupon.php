<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';

    protected $fillable = [
        'coupon_name',
        'expiry_date',
        'coupon_type',
        'discount',
        'status',
    ];
}

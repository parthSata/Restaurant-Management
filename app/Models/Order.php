<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'order_id',
        'order_date',
        'order_status',
        'order_type',
        'payment_status',
        'restaurant_id',
    ];

    // Define the relationship with the Restaurant model
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

}

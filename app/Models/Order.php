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
        'customer_id',
        'restaurant_id',
        'order_id',
        'order_date',
        'order_status',
        'subtotal',
        'delivery_fee',
        'order_type',
        'payment_status',
        'delivery_address',
    ];

    public function customer()
    {
        return $this->belongsTo(Registration::class, 'customer_id', 'id');
    }

    public function restaurant()
{
    return $this->belongsTo(Restaurant::class);
}

    public function items()
    {
        return $this->hasMany(Order::class); // Assuming OrderItem is the related model
    }

}

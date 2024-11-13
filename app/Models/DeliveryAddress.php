<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural form of the model name
    protected $table = 'delivery_addresses';

    // Allow mass assignment for these fields
    protected $fillable = [
        'restaurant_id',
        'customer_id',
        'address',
        'city',
        'zip_code',
    ];

    /**
     * Define the relationship with the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class); // assuming the 'users' table is being used
    }

    /**
     * Define the relationship with the Restaurant model.
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class); // assuming the 'restaurants' table is being used
    }

    /**
     * Define the relationship with the Customer model.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class); // assuming the 'customers' table is being used
    }
}

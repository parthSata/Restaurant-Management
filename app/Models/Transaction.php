<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Specify the table name if it differs from the default
    protected $table = 'transactions';

    // Define the fillable attributes
    protected $fillable = [
        'transaction_id',
        'payment_gateway',
        'amount',
        'payment_status',
        'created_at',
        'updated_at',
    ];

    // If timestamps are manually handled, set this to false
    public $timestamps = true;

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_name',
        'customer_name',
        'phone',
        'expected_person',
        'expected_date',
        'expected_time',
    ];
}

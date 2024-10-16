<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddOnItem extends Model
{
    protected $table = 'add_on_items';

    // The attributes that are mass assignable
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image',
    ];

    // Define the relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

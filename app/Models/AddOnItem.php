<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddOnItem extends Model
{
    protected $table = 'add_on_items';

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image',
        'menu_id' 
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function menu()
    {
        return $this->belongsTo(MenuType::class, 'menu_id');
    }
}

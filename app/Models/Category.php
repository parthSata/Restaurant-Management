<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name', 'description', 'image'];

    public function addOnItems()
    {
        return $this->hasMany(AddOnItem::class, 'category_id');
    }
}
    
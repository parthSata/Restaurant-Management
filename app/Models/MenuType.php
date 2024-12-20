<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id', 'image'];

    public function parent()
    {
        return $this->belongsTo(MenuType::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(MenuType::class, 'parent_id');
    }

public function addedItems()
{
    return $this->hasMany(AddedItem::class, 'menu_id');
}
}

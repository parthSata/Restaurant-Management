<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddedItem extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id', 'item_id']; // Fillable fields

    public function item()
    {
        return $this->belongsTo(AddOnItem::class, 'item_id');
    }
}

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
            'image'
        ];

        public function category()
        {
            return $this->belongsTo(Category::class, 'category_id');
        }
        
        public function menus()
        {
            return $this->belongsToMany(MenuType::class, 'added_items', 'item_id', 'menu_id');
        }

        public static function getRandomItems(int $limit = 4)
        {
            return self::inRandomOrder()->take($limit)->get();
        }

        public function restaurant()
{
    return $this->belongsTo(Restaurant::class, 'restaurant_id'); // Or use the correct column name if different
}

    
}

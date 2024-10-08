<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
     
    protected $table = 'foods';
    protected $fillable = ['resturent_id', 'name', 'material', 'price', 'picture', 'tags', 'discount', 'food_party'];

    // Relation with resturent
    public function resturent()
    {
        return $this->belongsTo(Resturent::class, 'resturent_id');
    }

    // Relation with order_food_item
    public function orderFoodItem()
    {
        return $this->hasMany(OrderFoodItem::class, 'food_id');
    }

    // Relation with carts
    public function carts()
    {
        return $this->hasMany(Cart::class, 'food_id');
    }

    // Scope filter for search in seller foods page based on foods name & tags
    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false) {
            $query->where('tags', 'like', '%' .request('search'). '%')
            
            ->orWhere('name', 'like', '%' .request('search'). '%');
        }
    }
}

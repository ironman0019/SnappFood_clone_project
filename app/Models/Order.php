<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['order_status'];



    // Relation with order_food_item
    public function orderFoodItem()
    {
        return $this->hasMany(OrderFoodItem::class, 'order_id');
    }
}

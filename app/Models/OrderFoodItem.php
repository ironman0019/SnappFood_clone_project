<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFoodItem extends Model
{
    use HasFactory;

    protected $table = 'order_food_item';

    // Relation with order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    // Relation with food
    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }
}

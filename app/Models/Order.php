<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['user_id','resturent_id','address','delivary_fee','total_amount','order_status'];



    // Relation with order_food_item
    public function orderFoodItem()
    {
        return $this->hasMany(OrderFoodItem::class, 'order_id');
    }

    // Relation with comments
    public function comments()
    {
        return $this->hasMany(Comment::class, 'order_id');
    }

    // Relation with resturent
    public function resturent()
    {
        return $this->belongsTo(Resturent::class, 'resturent_id');
    }

    // Scope filter for sort orders by month or week
    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false) {

            if(request('search') == "week") {
                $query->whereYear('created_at', date('Y'))->whereBetween('created_at', [Carbon::today()->subDays(6), Carbon::now()]);
            }
            elseif(request('search') == "month") {
                $query->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'));
            }

        }
    }
}

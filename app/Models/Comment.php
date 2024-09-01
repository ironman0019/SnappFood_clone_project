<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','order_id','body','reply'];

    // Relation with user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relation with order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}

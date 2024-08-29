<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','food_id', 'resturent_id', 'quantity'];

    // Relation with food
    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }

    // Relation with user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

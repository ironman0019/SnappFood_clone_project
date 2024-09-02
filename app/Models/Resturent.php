<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resturent extends Model
{
    use HasFactory;

    protected $fillable = ['seller_id', 'name', 'tag', 'phone', 'address', 'bank', 'photo', 'delivary_price', 'work_hours', 'status'];

    // Relation with seller
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    // Relation with foods
    public function foods()
    {
        return $this->hasMany(Food::class, 'resturent_id');
    }

    // Relation with rateings
    public function rateings()
    {
        return $this->hasMany(Rate::class, 'resturent_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Seller extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'password'];

    // Relation with resturent
    public function resturent()
    {
        return $this->hasOne(Resturent::class, 'seller_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resturent extends Model
{
    use HasFactory;

    protected $fillable = ['seller_id', 'name', 'tag', 'phone', 'address', 'bank', 'photo', 'delivary_price', 'work_hours', 'status'];
}

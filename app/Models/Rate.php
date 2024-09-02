<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $table = 'rateings';
    protected $fillable = ['user_id','resturent_id','rate'];

    // Relation with resturent
    public function resturent()
    {
        return $this->belongsTo(Resturent::class,'resturent_id');
    }

    // Relation with user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

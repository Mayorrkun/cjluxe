<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    //

    protected $fillable =[
        'user_id',
        'session_id',
        'status'
    ];

    public function customers(){
        return $this->belongsTo(Customers::class);
    }
    public function cartItems(){
        return $this->hasMany(CartItems::class);
    }
}

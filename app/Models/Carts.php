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

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function cartitems(){
        return $this->hasMany(CartItems::class ,'cart_id');
    }
}

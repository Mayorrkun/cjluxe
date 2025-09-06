<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    //
    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'price',
        'discount',
        'size'
    ];

    public function carts(){
       return $this->belongsTo(Carts::class);
    }

    public function product(){
       return $this->belongsTo(Products::class, 'product_id');
    }
}

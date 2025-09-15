<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    //
    protected $fillable =[
      'order_id',
      'product_id',
      'quantity',
      'price',
      'discount',
        'size'
    ];

    public function orders(){
        return $this->belongsTo(Orders::class, 'order_id');
    }

    public function product(){
        return $this->belongsTo(Products::class, 'product_id');
    }
}

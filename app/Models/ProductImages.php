<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    //
    protected $fillable = [
        'product_id',
        'img_src',
    ];

    public function products(){
        return $this->belongsTo(Products::class, 'product_id');
}

}

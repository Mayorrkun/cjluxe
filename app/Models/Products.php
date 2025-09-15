<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $fillable = [
        'product_name',
        'description',
        'quantity',
        'price',
        'discount',
        'category_id',
        'sold_out'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function images(){
        return $this->HasMany(ProductImages::class, 'product_id');
    }

    public function orders(){
        return $this->belongsTo(Orders::class);
    }
}

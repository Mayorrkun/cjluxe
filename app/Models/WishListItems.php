<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishListItems extends Model
{
    //
    protected $fillable = [
        'wish_list_id',
        'product_id',
    ];
    public function wishlist(){
        return $this->belongsTo(WishList::class, 'wish_list_id');
    }
}

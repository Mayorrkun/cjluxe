<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    //
    protected $fillable =[
        'user_id',
    ];
    public function customers(){
        return $this->belongsTo(Customers::class);
    }

    public function wishListItems(){
        return $this->HasMany(WishListItems::class);
    }
}

class WishListItems extends Model
{
    //
    protected $fillable = [
        'wishlist_id',
        'product_id',
    ];
    public function wishList(){
        return $this->belongsTo(WishList::class);
    }
}

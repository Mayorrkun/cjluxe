<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    //

    public function carts(){
        return $this->hasMany(Customers::class);
    }
    public function orders(){
        return $this->hasMany(Orders::class);
    }
}

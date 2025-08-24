<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    //

    public function customers(){
        return $this->belongsTo(Customers::class);
    }
}

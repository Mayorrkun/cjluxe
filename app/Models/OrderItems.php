<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    //

    public function orders(){
        return $this->belongsTo(Orders::class);
    }
}

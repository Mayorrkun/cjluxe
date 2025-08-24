<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    public function orderItems(){
        return $this->hasmany(OrderItems::class);
    }
    public function customers(){
        return $this->belongsTo(Customers::class);
    }
}

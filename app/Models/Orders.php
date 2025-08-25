<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $fillable =[
        'customer_id',
        'reference',
        'status',
        'address',
        'city',
        'state',
        'total'
    ];
    public function orderItems(){
        return $this->hasmany(OrderItems::class);
    }
    public function customers(){
        return $this->belongsTo(Customers::class);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function products(){
        return view('Admin.product.products');
    }
    public function product(Products $product){

        return view('Admin.product.product',['product'=>$product]);
    }
}

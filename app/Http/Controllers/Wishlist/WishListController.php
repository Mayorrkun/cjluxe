<?php

namespace App\Http\Controllers\Wishlist;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    //
    public function index(){
        if(Auth::user()->wishlist){
            return view('wishlist');
        }
        else{
            return redirect()->route('login.page');
        }

    }

    public function store(Products $product){
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
class ProductController extends Controller
{
    //
    public function index($id){

        $product =Products::find(Crypt::decrypt($id));
        return view('products.product', ['product' => $product]);
    }
}

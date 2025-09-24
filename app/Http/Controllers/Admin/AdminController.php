<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Orders;
use App\Models\ProductImages;
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
    public function orders(){
        return view('Admin.orders.orders');
    }

    public function order(Orders $order){
        return view('Admin.orders.order',['order' => $order]);
    }
    public function delivered(Products $products){

        $products->update([
            'is_Delivered' => true
        ]);
    }

    public function create(){
        return view('Admin.product.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|',
            'category' =>'required|string',
            'images.*' => 'required|image|mimes:png,jpg|max:1024'
        ]);

        //create product
        $category = Category::where('category_name',$validated['category'])->first();

        $product = Products::create([
            'product_name' => $validated['product_name'],
            'description' => $validated['description'],
            'quantity' => $validated['quantity'],
            'price' => $validated['price'],
            'discount' => 0,
            'category_id' => $category->id,
            'sold_out' => false
        ]);
        // images
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $path = $image->store('products','public');

                ProductImages::create([
                    'product_id' => $product->id,
                    'img_src' => 'storage/'. $path,
                ]);
            }
        }
        return redirect()->route('admin.product',['product' => $product->id]);
    }

}

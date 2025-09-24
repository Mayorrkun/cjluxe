<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Products;

class MiscController extends Controller
{
    //
    public function delItem(Products $product){
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Item has been deleted');
    }
    public function editItem(Products $product, Request $request){
        $description = $request->input('description');
        $price = $request->input('price');
        $quantity = $request->input('quantity');
        $product->update([
            'description' => $description,
            'price' => $price,
            'quantity' => $quantity]);
        return redirect()->route('admin.products')->with('success','Item Updated');
    }
}

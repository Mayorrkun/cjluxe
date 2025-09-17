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

    public function search(Request $request){
        $query = $request->get('query');

        $products = Products::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->limit(5)
            ->get()
            ->map(function($product){
                return [
                    'id' => Crypt::encrypt($product->id),
                    'name' => $product->product_name,
                    'image' => url($product->images->first()->img_src)
                ];
            });

        return response()->json($products);
    }
}

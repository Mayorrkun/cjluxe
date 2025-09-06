<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class GeneralController extends Controller
{
    //
    public function index()
    {
        $products = Products::paginate();

        if (Auth::check()) {
            if (Auth::user()->hasRole('admin')) {
                return view('Admin.home', ['products' => $products]);
            }

            $cart = Carts::where('user_id', Auth::id())->first();

            return view('home', [
                'products' => $products,
                'cart'     => $cart,
            ]);
        }

        return view('home', [
            'products' => $products,
            'cart'     => null,
        ]);
    }


    public function categoryIndex(){
        $categories = Category::paginate(5);
        return view('categories', ['categories' => $categories]);
    }

    public function contact(){
        return view('contact');
    }
}

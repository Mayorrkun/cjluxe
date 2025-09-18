<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
class GeneralController extends Controller
{
    //
    public function index()
    {
        $products = Products::all();
        $agent = new Agent();
        if($agent->isMobile()){
            $products = Products::where('sold_out',0)->inRandomOrder()->paginate(6);
        }
        elseif ($agent->isDesktop()){
            $products = Products::where('sold_out',0)->inRandomOrder()->paginate(8);
        }


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
        $categories = Category::paginate(1);
        return view('categories', ['categories' => $categories]);
    }

    public function contact(){
        return view('contact');
    }
}

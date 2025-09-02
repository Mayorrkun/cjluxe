<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class GeneralController extends Controller
{
    //
    public function index(){
        if(Auth::check()){
            if(Auth::user()->hasRole('admin')){
                return view('Admin.home');
            }
        }
        return view('home');
    }
}

<?php

use Illuminate\Support\Facades\Route;
// Controllers
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Main\GeneralController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Cart\CartController;
//MiddleWares
use App\Http\Middleware\Admin;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\AuthMiddleware;

//general routes
Route::get('/', [GeneralController::class, 'index'])->name('home');
Route::get('/contact', [GeneralController::class, 'contact'])->name('contact');

//admin routes
Route::get('/admin/home', function () {
    return view('Admin.home');
});

//Log in Routes
Route::get('/login-page',[AuthenticatedSessionController::class, 'create'])->middleware(GuestMiddleware::class)->name('login.page');
Route::get('/login',[AuthenticatedSessionController::class, 'store'])->middleware(GuestMiddleware::class)->name('login');

//Register Routes
Route::get('/register-page',[RegisteredUserController::class, 'create'])->middleware(GuestMiddleware::class)->name('register.page');
Route::post('/register',[RegisteredUserController::class, 'store'])->middleware(GuestMiddleware::class)->name('register');

Route::get('logout',[AuthenticatedSessionController::class, 'destroy'])->middleware(AuthMiddleware::class)->name('logout');

//categories page
Route::get('/categories',[GeneralController::class, 'categoryIndex'])->name('categories.index');

//product routes
Route::get('/product/{id}',[ProductController::class, 'index'])->name('product.index');

//cart routes
Route::post('/add-to-cart/{product}',[CartController::class, 'store'])->name('cart.store');
Route::get('/remove-item/{cartItem}',[CartController::class,'remove'])->name('cart.remove');
require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
// Controllers
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Main\GeneralController;
use App\Http\Controllers\Auth\RegisteredUserController;
//MiddleWares
use App\Http\Middleware\Admin;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\AuthMiddleware;

Route::get('/', [GeneralController::class, 'index'])->name('home');

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
require __DIR__.'/auth.php';

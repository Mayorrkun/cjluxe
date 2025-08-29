<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\GeneralController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Controllers\Auth\RegisteredUserController;
Route::get('/', [GeneralController::class, 'index'])->name('home');

Route::get('/admin/home', function () {
    return view('Admin.home');
})->middleware(Admin::class);

//Log in Routes
Route::get('/login-page',[AuthenticatedSessionController::class, 'create'])->middleware(GuestMiddleware::class)->name('login.page');


//Register Routes
Route::get('/register-page',[RegisteredUserController::class, 'create'])->middleware(GuestMiddleware::class)->name('register.page');
Route::post('/register',[RegisteredUserController::class, 'store'])->middleware(GuestMiddleware::class)->name('register');
require __DIR__.'/auth.php';

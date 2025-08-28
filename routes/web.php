<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\GeneralController;
use App\Http\Middleware\Admin;


Route::get('/', [GeneralController::class, 'index'])->name('home');

Route::get('/admin/home', function () {
    return view('Admin.home');
})->middleware(Admin::class);

Route::get('/login-page',[AuthenticatedSessionController::class, 'create'])->name('login.page');

require __DIR__.'/auth.php';

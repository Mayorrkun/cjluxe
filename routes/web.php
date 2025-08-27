<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\GeneralController;
Route::get('/', [GeneralController::class, 'index'])->name('home');

require __DIR__.'/auth.php';

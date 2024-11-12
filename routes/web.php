<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;


Route::get('/',[AuthController::class,'loginView'])->name('login-view');
Route::post('/login',[AuthController::class,'login']);

Route::get('/register',[AuthController::class,'registerView'])->name('register-view');
Route::post('/register',[AuthController::class,'register'])->name('register');

Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::middleware(Authenticate::class)->group(function(){
    Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard');
});


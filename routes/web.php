<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class,'index'])->name('home.index');

// luck.nema@gmail.com abc123
Route::get('{role}/login', [LoginController::class,'loginForm'])->name('login');
Route::post('{role}/login', [LoginController::class,'login']);
Route::get('logout', [LoginController::class,'logout'])->name('logout');

Route::get('{role}/register', [RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('{role}/register', [RegisterController::class,'register']);

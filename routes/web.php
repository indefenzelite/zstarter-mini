<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;










// List of all resources OK
Route::get('/users', [HomeController::class,'index'])->name('user.index');

// Create Form OK
Route::get('/user/create', [HomeController::class,'create'])->name('user.create');

// Create Form -> Store OK
Route::get('/user/store', [HomeController::class,'store'])->name('user.store');

// Selected Resource Edit Form 
Route::get('/user/edit/{id}', [HomeController::class,'edit'])->name('user.edit');

// Edit Form -> Update
Route::get('/user/update/{id}', [HomeController::class,'update'])->name('user.update');

// Selected Resource Delete
Route::get('/user/delete/{id}', [HomeController::class,'destroy'])->name('user.delete');




















// luck.nema@gmail.com abc123
Route::get('{role}/login', [LoginController::class,'loginForm'])->name('login');
Route::post('{role}/login', [LoginController::class,'login']);
Route::get('logout', [LoginController::class,'logout'])->name('logout');

Route::get('{role}/register', [RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('{role}/register', [RegisterController::class,'register']);

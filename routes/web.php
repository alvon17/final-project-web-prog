<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WebController;


//all roles
Route::get('/', [WebController::class, 'dashboard'])->name('homepage');
Route::get('/', [WebController::class, 'product'])->name('homepage');
Route::get('/dashboard', [WebController::class, 'product'])->name('homepage');
Route::get('/dashboard', [WebController::class, 'dashboard'])->name('homepage');
Route::get('/category/{name}', [WebController::class, 'category']);
Route::get('/detail/{id}', [WebController::class, 'detail']);
Route::get('/search', [WebController::class, 'search'])->name('search');

//admin & user
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [WebController::class, 'profile']);
});

//guest
Route::middleware('guest')->group(function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/custom-login', [AuthController::class, 'customLogin']);
    Route::get('/registration', [AuthController::class, 'registration']);
    Route::post('/custom-registration', [AuthController::class, 'customRegistration']);
});

//admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/manage', [AdminController::class, 'manage']);
    Route::get('/add', [AdminController::class, 'add']);
    Route::get('/manage/update/{id}', [AdminController::class, 'update']);
    Route::post('/manage/edit', [AdminController::class, 'edit']);
    Route::get('/manage/delete/{id}', [AdminController::class, 'deleteProduct']);
    Route::get('/manage/search', [AdminController::class, 'manageSearch'])->name('manageSearch');
    Route::post('/custom-add-product', [AdminController::class, 'customAddProduct']);
});

//user
Route::middleware('auth', 'user')->group(function () {
    Route::post('/cart/{product}', [UserController::class, 'addToCart']);
    Route::get('/cart/delete/{id}', [UserController::class, 'removeFromCart']);
    Route::post('/purchase', [UserController::class, 'purchase']);
    Route::get('/history', [UserController::class, 'history']);
    Route::get('/cart', [UserController::class, 'cart']);
});
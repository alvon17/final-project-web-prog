<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//all roles
Route::get('/', [AuthController::class, 'dashboard'])->name('homepage');
Route::get('/', [ProductController::class, 'product'])->name('homepage');
Route::get('/dashboard', [ProductController::class, 'product'])->name('homepage');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('homepage');
Route::get('/category/{name}', [ProductController::class, 'category']);
Route::get('/detail/{id}', [ProductController::class, 'detail']);
Route::get('/search', [AuthController::class, 'search'])->name('search');

//admin & user
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
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
    Route::get('/manage', [AuthController::class, 'manage']);
    Route::get('/add', [AuthController::class, 'add']);
    Route::get('/manage/update/{id}', [AuthController::class, 'update']);
    Route::post('/manage/edit', [AuthController::class, 'edit']);
    Route::get('/manage/delete/{id}', [AuthController::class, 'deleteProduct']);
    Route::get('/manage/search', [AuthController::class, 'manageSearch'])->name('manageSearch');
    Route::post('/custom-add-product', [AuthController::class, 'customAddProduct']);
});

//user
Route::middleware('auth', 'user')->group(function () {
    Route::post('/cart/{product}', [CartController::class, 'addToCart']);
    Route::get('/cart/delete/{id}', [CartController::class, 'removeFromCart']);
    Route::post('/purchase', [CartController::class, 'purchase']);

    //apa bedanya?
    Route::get('/history', [CartController::class, 'history']);
    // Route::get('/transaction', [AuthController::class, 'transaction']); // function di controllernya ku komen aman si

    //apa bedanya?
    Route::get('/cart', [CartController::class, 'cart']);
    // Route::get('/cart', [AuthController::class, 'cart']); // function di controllernya ku komen aman si
});
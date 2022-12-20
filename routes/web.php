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

Route::get('/', [AuthController::class, 'dashboard']);
Route::get('/', [ProductController::class, 'product']);

Route::get('/category/{name}', [ProductController::class, 'category']);
Route::get('/detail/{id}', [ProductController::class, 'detail']);
Route::get('/dashboard', [ProductController::class, 'product']);
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/custom-login', [AuthController::class, 'customLogin']);
Route::get('/registration', [AuthController::class, 'registration']);
Route::post('/custom-registration', [AuthController::class, 'customRegistration']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/manage', [AuthController::class, 'manage']);
Route::get('/add', [AuthController::class, 'add']);
Route::get('/manage/update/{id}', [AuthController::class, 'update']);
Route::post('/manage/edit', [AuthController::class, 'edit']);
Route::get('/manage/delete/{id}', [AuthController::class, 'deleteProduct']);
Route::get('/manage/search', [AuthController::class, 'manageSearch'])->name('manageSearch');

Route::get('/profile', [AuthController::class, 'profile']);
Route::post('/custom-add-product', [AuthController::class, 'customAddProduct']);
Route::get('/cart', [AuthController::class, 'cart']);
Route::get('/transaction', [AuthController::class, 'transaction']);

Route::get('/search', [AuthController::class, 'search'])->name('search');

Route::get('/cart', [CartController::class, 'cart']);
Route::post('/cart/{product}', [CartController::class, 'addToCart']);
Route::get('/cart/delete/{id}', [CartController::class, 'removeFromCart']);
Route::post('/purchase', [CartController::class, 'purchase']);
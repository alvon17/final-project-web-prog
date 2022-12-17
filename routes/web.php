<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
Route::get('/', [ProductController::class,'product']);
Route::get('/category/{id}', [ProductController::class, 'category']);
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/custom-login', [AuthController::class, 'customLogin']);
Route::get('/registration', [AuthController::class, 'registration']);
Route::post('/custom-registration', [AuthController::class, 'customRegistration']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/detail', [AuthController::class, 'detail']);
Route::get('/manage', [AuthController::class, 'manage']);
Route::get('/profile', [AuthController::class, 'profile']);
Route::get('/add', [AuthController::class, 'add']);
Route::get('/update', [AuthController::class, 'update']);
Route::get('/cart', [AuthController::class, 'cart']);
Route::get('/transaction', [AuthController::class, 'transaction']);
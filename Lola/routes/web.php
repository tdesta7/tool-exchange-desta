<?php

use App\Http\Controllers\LolaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SliderController;
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
Route::get('/admin', [AdminController::class, 'admin']);

Route::get('/addcategory', [CategoryController::class, 'addcategory']);

Route::get('/categories', [CategoryController::class, 'categories']);


Route::get('/addproduct', [ProductController::class, 'addproduct']);

Route::get('/products', [ProductController::class, 'products']);

Route::get('/', [LolaController::class, 'home']);

Route::get('/shop', [LolaController::class, 'shop']);

Route::get('/cart', [LolaController::class, 'cart']);

Route::get('/checkout', [LolaController::class, 'checkout']);

Route::get('/login', [LolaController::class, 'login']);

Route::get('/signup', [LolaController::class, 'signup']);

Route::get('/orders', [LolaController::class, 'orders']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::get('get-cart-products/{id}', [CartController::class, 'getProducts']);
Route::post('addProductToCart', [ProductController::class, 'addProductToCart']);

Route::get('get-wishlist-products/{id}', [WishlistController::class, 'getProducts']);
Route::post('addProductToWishlist', [ProductController::class, 'addProductToWishlist']);

Route::delete('delete-product-from-cart', [ProductController::class, 'deleteFromCart']);
Route::delete('delete-product-from-wishlist', [ProductController::class, 'deleteFromWishlist']);

Route::get('get-orders/{id}', [UserController::class, 'getOrders']);
Route::post('add-order', [orderController::class, 'addOrder']);
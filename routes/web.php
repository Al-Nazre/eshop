<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/', [FrontendController::class, 'index'] );
Route::get('/category', [FrontendController::class, 'category'] );
Route::get('/category/{slug}', [FrontendController::class, 'viewcategory'] );
Route::get('/category/{cate_slug}/{prod_slug}', [FrontendController::class, 'viewproduct'] );

Route::post('/add-to-cart', 'Frontend\CartController@addProduct')->name('addProduct');

Route::middleware(['auth'])->group(function () {
    Route::get('cart', 'Frontend\CartController@viewCart')->name('cart');
    Route::post('/update-cart', 'Frontend\CartController@updateCart')->name('updateCart');
    Route::post('/delete-cart-item', 'Frontend\CartController@removeCartProduct')->name('removeCartProduct');
    Route::get('/checkout', 'Frontend\CheckoutController@index')->name('checkoutIndex');
    Route::post('/place-order', 'Frontend\CheckoutController@placeOrder')->name('placeOrder');

});

Route::middleware(['auth', 'isAdmin'])->group( function(){
   Route::get('/dashboard', 'Admin\FrontendController@index');
   Route::get('/categories', [CategoryController::class, 'index']);
   Route::get('/add/category', [CategoryController::class, 'add']);
   Route::post('/category/insert', [CategoryController::class, 'insert']);
   Route::get('category-edit/{id}', [CategoryController::class, 'edit']);
   Route::put('category-update/{id}', [CategoryController::class, 'update']);
   Route::get('category-delete/{id}', [CategoryController::class, 'delete']);
   Route::get('products', [ProductController::class, 'index']);
   Route::get('add-product', [ProductController::class, 'add']);
   Route::post('insert-product', [ProductController::class, 'insert']);
   Route::get('delete-product/{id}', [ProductController::class, 'delete']);
   Route::get('edit-product/{id}', [ProductController::class, 'edit']);
   Route::put('update-product/{id}', [ProductController::class, 'update']);

});
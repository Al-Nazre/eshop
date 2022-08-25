<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
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
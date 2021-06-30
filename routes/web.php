<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\Profile;
use App\Http\Controllers\Admin\OrdersController;
use Illuminate\Http\Request;

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
//URL::forceRootUrl('http://studenti.sum.ba/projekti/fsre_rwa/2020/g22');

Route::get('/',[\App\Http\Controllers\ProductController::class, 'index'])->name('index');

Route::get('about_us',function (Request $request){
    return view('about_us');
});

Route::get('/add_to_cart/{id}',[\App\Http\Controllers\ProductController::class, 'getAddToCart'])->name('addToCart');

Route::get('/getReduceByOne/{id}',[\App\Http\Controllers\ProductController::class, 'getReduceByOne'])->name('reduceByOne');

Route::get('/getRemoveItem/{id}',[\App\Http\Controllers\ProductController::class, 'getRemoveItem'])->name('removeItem');

Route::get('/shopping_cart',[\App\Http\Controllers\ProductController::class, 'getCart'])->name('shoppingCart');

Route::get('/checkout',[\App\Http\Controllers\ProductController::class, 'getCheckout'])->name('checkout')->middleware('auth');

Route::post('/checkout',[\App\Http\Controllers\ProductController::class, 'postCheckout'])->name('checkout')->middleware('auth');
//Korisnika
//
Route::group(['middleware' => 'auth'], function() {
    Route::get('/profile', [UserController::class, 'getProfile'])->name('user.profile');
});
//Admin
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function (){
    Route::resource('/users', UserController::class);
    Route::resource('/products',\App\Http\Controllers\Admin\ProductController::class);
    Route::resource('/orders', OrdersController::class);
});


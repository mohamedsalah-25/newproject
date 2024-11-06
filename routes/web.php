<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/index', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/redirect', [App\Http\Controllers\HomeController::class, 'redirect']);
//Products Operations


Route::get('/all', [App\Http\Controllers\HomeController::class, 'allproduct']);
Route::get('/partProduct', [App\Http\Controllers\HomeController::class, 'partProduct']);
Route::get('deleteProduct/{id}', [App\Http\Controllers\AdminController::class, 'deleteProduct']);
Route::get('/watches', [App\Http\Controllers\HomeController::class, 'watchesPage']);
Route::get('/bags', [App\Http\Controllers\HomeController::class, 'bagsPage']);
Route::get('/shoes', [App\Http\Controllers\HomeController::class, 'shoesPage']);
Route::get('/acc', [App\Http\Controllers\HomeController::class, 'accPage']);
Route::get('add_product', [App\Http\Controllers\AdminController::class, 'add_product']);
Route::post('add_product', [App\Http\Controllers\AdminController::class, 'create']);
Route::get('add_product/{req}', [App\Http\Controllers\HomeController::class, 'show']);
Route::get('edit_product/{id}', [App\Http\Controllers\AdminController::class, 'edit_product']);
Route::put('update_product/{id}', [App\Http\Controllers\AdminController::class, 'update_product'])->name('product.update');
Route::get('showGallary/{id}', [App\Http\Controllers\AdminController::class, 'showGallary']);
Route::get('single_product/{productId}', [App\Http\Controllers\HomeController::class, 'single_product']);




Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('products.search');

Route::get('profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');

//shopping Cart Operations

//Route::get('cart', [App\Http\Controllers\HomeController::class, 'cart'])->name('home.cart');
Route::get('cart/{productId}', [App\Http\Controllers\HomeController::class, 'addToCart']);
Route::get('showcart', [App\Http\Controllers\HomeController::class, 'showcart'])->name('showcart');
Route::get('delete/{id}', [App\Http\Controllers\HomeController::class, 'deletecart'])->name('delete');
Route::patch('edit_quantity/{id}', [App\Http\Controllers\HomeController::class, 'edit_quantity'])->name('edit_quantity');
Route::patch('edit_shipping', [App\Http\Controllers\HomeController::class, 'edit_shipping'])->name('edit_shipping');


Route::get('myorder', [App\Http\Controllers\HomeController::class, 'myorder'])->name('myorder');
Route::post('myorder/{id}',[App\Http\Controllers\HomeController::class, 'remove_order'])->name('order.remove');



Route::get('about', [App\Http\Controllers\HomeController::class, 'about']);
Route::get('/send-email', [App\Http\Controllers\AdminController::class, 'sendEmail']);


//Route::get('single_product/', [App\Http\Controllers\HomeController::class, 'show_single_product'])->name('show_single_product');

<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CoordinateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('index');
});
Route::get('/terminos_y_condiciones', function () {
    return view('auth.tyc');
})->name('tyc');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile',[UserController::class, 'profile'])->name('users.profile')->middleware('can:users.profile');


Route::group(['prefix' => 'users','middleware' =>['role:admin'],'controller'=>UserController::class], function () {
	Route::get('/','index')->name('users.index')->middleware('can:users.index');
	Route::get('/show/{user}', 'show')->name('users.show')->middleware('can:users.show');
	Route::post('/store', 'store')->name('users.store')->middleware('can:users.store');
	Route::post('/update/{user}', 'update')->name('users.update')->middleware('can:users.update');
	Route::delete('/{user}', 'destroy')->name('users.destroy')->middleware('can:users.destroy');
});


Route::group(['prefix' => 'products','controller'=>ProductController::class], function () {
	Route::get('/','index')->name('products.index')->middleware('can:products.index');	
	Route::post('/store', 'store')->name('products.store')->middleware('can:products.store');
	Route::post('/update/{product}', 'update')->name('products.update')->middleware('can:products.update');
	Route::delete('/{product}', 'destroy')->name('products.destroy')->middleware('can:products.destroy');
	Route::get('/shop','home')->name('products.home')->middleware('can:products.home');
	Route::get('/info/{product}', 'info')->name('products.info')->middleware('can:products.info');
	Route::get('/search', 'search')->name('products.search')->middleware('can:products.search');
	Route::get('/cart',  'cart')->name('products.cart')->middleware('can:products.cart');

});

Route::group(['prefix' => 'categories','controller'=>CategoryController::class], function () {
	Route::get('/','index')->name('categories.index')->middleware('can:categories.index');
	Route::post('/', 'store')->name('categories.store')->middleware('can:categories.store');
	Route::put('/{category}', 'update')->name('categories.update')->middleware('can:categories.update');
	Route::delete('/{category}', 'destroy')->name('categories.destroy')->middleware('can:categories.destroy');
	Route::get('/allProducts/{category}','allProducts')->name('categories.allProducts')->middleware('can:categories.allProducts');
});

Route::group(['prefix' => 'publications','controller'=>PublicationController::class], function () {
	Route::get('/','index')->name('publications.index')->middleware('can:publications.index');
	Route::post('/store', 'store')->name('publications.store')->middleware('can:publications.store');
	// Route::put('/{publication}', 'update')->name('publications.update');
	Route::delete('/{publication}', 'destroy')->name('publications.destroy')->middleware('can:publications.destroy');
});
Route::group(['prefix' => 'coordinates','controller'=>CoordinateController::class], function () {
	Route::get('/{post_id}','index')->name('coordinates.index')->middleware('can:coordinates.index');
	// Route::get('/{post_id}/coordinates','show')->name('coordinates.show');
	Route::post('/store', 'store')->name('coordinates.store')->middleware('can:coordinates.store');
	// Route::put('/{publication}', 'update')->name('publications.update');
	Route::delete('/{post_id}', 'destroy')->name('coordinates.destroy')->middleware('can:coordinates.destroy');
});
});
<?php

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

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
// =============== Front-end routes =================
Route::get('/', 'Frontend\HomeController@index')->name('home');

Route::get('/contact', 'Frontend\HomeController@contact')->name('contact');

Route::get('/category/{slug}/{category}', 'Frontend\CategoryController@index')->name('category.products');

Route::prefix('cart')->group(function () {
    Route::get('/', 'Frontend\CartController@index')->name('cart.index');
    Route::get('/addToCart/{product}', 'Frontend\CartController@addProductToCart')->name('cart.add');
    Route::get('/updateItemPrice/{product}/', 'Frontend\CartController@updateItemPrice')->name('cart.update');
    Route::get('/deleteFromCart/{product}', 'Frontend\CartController@deleteProductFromCart')->name('cart.delete');
    Route::get('/getCart', 'Frontend\CartController@getCart')->name('cart.get');
});
// Search for a product
Route::get('/search', 'Frontend\ProductController@search')->name('product.search');

// Show products list
Route::get('/products', 'Frontend\ProductController@index')->name('product.index');

// Show products detail
Route::get('/product-detail/{product}', 'Frontend\ProductController@showProductDetail')->name('product.detail');

// Check out
Route::get('/checkout', 'Frontend\ProductController@showCheckoutPage')->name('product.checkout');

// =============== End Front-end routes =================


// =============== Back-end, Admin routes =================
Route::get('/admin', 'AdminController@loginAdmin')->name('logIn');
Route::post('/admin', 'AdminController@postLoginAdmin')->name('postLoginAdmin');
Route::get('/logOut', 'AdminController@logOut')->name('logOut');

Route::get('/home', function () {
    if ( Gate ::allows('access-admin') ) {
        return view('home');
    }
    else {
        return redirect()->route('home');
    }
})->name('admin.home');

Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/index', 'CategoryController@index')->name('category.index');
        Route::get('/create', 'CategoryController@create')->name('category.create');
        Route::post('/store', 'CategoryController@store')->name('category.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('category.update');
        Route::get('/delete/{id}', 'CategoryController@delete')->name('category.delete');
    });

    Route::resource('menus', 'MenuController');
    Route::prefix('menus')->group(function () {
        Route::get('/delete/{id}', 'MenuController@delete')->name('menus.delete');
    });

    Route::resource('products', 'ProductController');

    Route::resource('slider', 'SliderController');

    Route::resource('settings', 'SettingController');

    Route::resource('users', 'UserController');

    Route::resource('roles', 'RoleController');

    Route::resource('permissions', 'PermissionController');

});
// =============== End Back-end, Admin routes =================

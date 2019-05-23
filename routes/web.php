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

// Route::get('/', function () {
//     return view('layoutsUser.layout');
// });

Auth::routes(['verify' => true]);
Route::get('/','User\HomeController@index')->name('home');
Route::get('/home', 'User\HomeController@index')->name('home')->middleware('verified');
Route::get('/menu', 'User\MenuController@index');
Route::get('/product/{id}','User\ProductController@product');

Route::get('/cart','User\CartController@cart');
Route::post('/add_item','User\CartController@addItem');
Route::get('/get_item','User\CartController@getItem');
Route::get('/delete_item/{id}','User\CartController@deleteItem');

Route::get('/checkout','User\CheckoutController@checkout');
Route::post('/checkedout','User\CheckoutController@checkedout');
Route::post('/shipping','User\CheckoutController@shipping');

Route::get('/invoice','User\ProfileController@index');
Route::get('/upload_bukti/{id}','User\ProfileController@upload');
Route::put('/upload/{id}','User\ProfileController@uploadBukti');

Route::get('/user/profile', 'User\HomeController@profile')->name('user.profile');
Route::get('/user/logout','Auth\LoginController@logoutUser')->name('user.logout');

Route::group(['prefix'=>'admin', 'guard'=>'admin'],function(){
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::get('/', 'Admin\AdminController@index')->name('admin.home');
    Route::get('/logout','AuthAdmin\LoginController@logout')->name('admin.logout');
    Route::resource('courier', 'Admin\CourierController');
    Route::resource('categories', 'Admin\CategoriesController');
    Route::resource('products', 'Admin\ProductsController');
    Route::resource('discount', 'Admin\DiscountController');
    Route::get('/transaksi','Admin\TransaksiController@index');
    Route::put('transaksi/{{id}}','Admin\TransaksiController@updateStatus');
});

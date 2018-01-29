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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@details')->name('home');
Route::resource('admin/location', 'LocationsController');
Route::resource('admin/bus', 'BussesController');
Route::get('admin/route', 'RoutesController@index')->name('route');
Route::post('admin/route', 'RoutesController@store')->name('route');
Route::get('/book', 'BookingsController@book')->name('book');
Route::post('/book', 'BookingsController@store')->name('route');
Route::get('/booking/{id}', 'BookingsController@booking')->name('booking');
Route::post('/booking', 'BookingsController@save')->name('route');
Route::get('/bookings', 'BookingsController@see')->name('route');
Route::any('/bookings/{id}', 'BookingsController@cancel');
Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
Route::any('downloadE/{type}', 'MaatwebsiteDemoController@downloadE');
Route::any('downloadBookings/{type}', 'MaatwebsiteDemoController@bookings');


Route::get('/pay', ['as' => 'pay', 'uses' => 'PaymentController@pay']);

 

# You will need one more.

 


Route::get('/payment/status', ['as' => 'payment_status', 'uses' => 'PaymentController@status']);



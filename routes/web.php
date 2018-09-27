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
//     return view('welcome');
// });

Route::get('/dashboard', 'PagesController@index');
Route::get('/dashboard/pages/offers', 'PagesController@offers');

// Route::resource('advertisement', 'AdvertisementController');
Route::resource('/dashboard/pages/offers', 'AdvertisementController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

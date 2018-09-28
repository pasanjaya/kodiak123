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

Route::get('/', 'LandingPageController@index');

// Route::get('/deals', 'LandingPageController@deals');
Route::get('/deals', 'DealsController@index');

Route::get('/about', 'LandingPageController@about');
Route::get('/contact', 'LandingPageController@contact');



Route::get('/dashboard', 'DashboardController@index');
Route::get('/dashboard/offers', 'DashboardController@offers');

// Route::resource('advertisement', 'AdvertisementController');
Route::resource('/dashboard/offers', 'AdvertisementController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

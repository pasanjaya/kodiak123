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

Route::get('/deals', 'DealsController@index');
// Route::get('/deals/{product}', 'DealsController@show')->name('deal.show');
Route::get('/details/{product}', 'DealsController@show')->name('details.show');

// Route::get('/details', 'LandingPageController@details');

Route::get('/about', 'LandingPageController@about');
Route::get('/contact', 'LandingPageController@contact');



Route::get('/dashboard', 'DashboardController@index');
Route::get('/dashboard/offers', 'DashboardController@offers');
Route::post('/dashboard/profile', 'DashboardController@profile'); //advertiser profile page
Route::post('/dashboard/verifyAd/verify','SuperuserAdvertisementController@verify');
Route::get('/dashboard/verifyAd/reject','SuperuserAdvertisementController@reject');

// Route::resource('advertisement', 'AdvertisementController');
Route::resource('/dashboard/offers', 'AdvertisementController');
Route::resource('/dashboard/profile', 'BusinessProfileController');
Route::resource('/superuser/dashboard', 'SuperuserController');
Route::resource('/dashboard/verifyAd', 'SuperuserAdvertisementController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



/*Route::get('/superuser/verify','MailController@verify');
Route::get('/email','MailController@email')->name('sendEmail');

Route::get('superuser/eemail', function () {
    return view('fromail');
});

Route::post('send', 'MailController@send');*/

//send notification mail to advertiser

Route::get('superuser/email', function () {
    return view('superuser/pages/frontmail');
});

Route::post('superuser/send', 'MailController@send');

//Route::get('superuser/dashboards', 'GraphController@index1');
Route::get('superuser/dashboard', 'GraphController@index');






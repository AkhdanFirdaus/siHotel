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

Auth::routes();

Route::resource('/', 'BookController');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/dashboard'], function() {
	Route::get('/', 'PagesController@dashboard')->name('dashboard');
});

Route::group(['prefix' => '/book'], function() {
	Route::get('/', 'PagesController@book')->name('book');
});
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

Route::get('/', 'PagesController@home')->name('home');

Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');

Route::resource('book', 'BookController', ['except' => ['create', 'store']]);
Route::post('{id}/pesan', 'BookController@pesan')->name('book.pesan');
Route::post('cari', 'BookController@pesan')->name('book.pesan');
Route::post('cari', 'BookController@search')->name('book.search');

Route::get('{kode_booking}/verifikasi', 'BookController@showVerify')->name('book.verifikasi');
Route::post('{kode_booking}/verifikasi', 'BookController@verify')->name('book.inverifikasi');

Route::resource('look', 'LookController');

Route::post('look/lihat', 'LookController@lihat')->name('lihatkode');

Route::post('email', 'HomeController@email')->name('mail');

Route::get('look/{kode_kamar}/pesan', 'LookController@order');
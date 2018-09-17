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

Route::middleware('admin')->prefix('dashboard')->group(function() {
	Route::get('/', 'AdminController@dashboard')->name('dashboard');
	Route::post('approve', 'AdminController@approve')->name('dashboard.approve');
});

Route::resource('book', 'BookController', ['except' => ['create', 'store']]);
Route::post('{id}/pesan', 'BookController@pesan')->name('book.pesan');
Route::post('cari', 'BookController@pesan')->name('book.pesan');
Route::post('cari', 'BookController@search')->name('book.search');

Route::get('{id}/verifikasi', 'BookController@showVerify')->name('book.verifikasi');
Route::post('{id}/verifikasi', 'BookController@verify')->name('book.inverifikasi');

Route::resource('look', 'LookController')->middleware('admin', ['except' => 'index']);
Route::post('look/cari', 'LookController@search')->name('look.search');

Route::post('look/kode', 'LookController@lihat')->name('lihat.kode');

Route::post('email', 'PagesController@email')->name('mail');

Route::get('look/{kode_kamar}/pesan', 'LookController@order');
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

Auth::routes();

Route::get('/', 'PagesController@home')->name('home');

Route::middleware(['auth', 'web'])->group(function () {
	Route::view('/home', 'home')->name('home');
});

Route::middleware('admin')->prefix('dashboard')->group(function () {

	Route::get('manageUser', 'AdminController@manageUser')->name('dashboard.manageUser');
	Route::put('manageUser/{id}', 'AdminController@updateUser')->name('dashboard.updateUser');

	Route::middleware('resepsionis')->group(function () {
		Route::get('/', 'ResepsionisController@dashboard')->name('dashboard');
		Route::get('reservasi', 'ResepsionisController@lookReserve')->name('dashboard.reservasi');

		//Aksi
		Route::post('{kode_booking}/approve', 'ResepsionisController@approve')->name('dashboard.approve');
		Route::delete('reservasi/delete/{kode_booking}', 'ResepsionisController@destroy')->name('dashboard.reservasi.delete');
		Route::post('{kode_booking}/warn', 'ResepsionisController@warnMail')->name('dashboard.warn');
	});

	Route::middleware('hotel')->group(function () {
		Route::resource('hotel', 'HotelController');
		Route::resource('kamar', 'KamarController');
	});
});

Route::post('cari', 'BookController@pesan')->name('book.pesan');
Route::post('cari', 'BookController@search')->name('book.search');

Route::get('pesan/{slug}', 'BookController@show')->where('slug', '[\w\d\-\_]+')->name('book.show');
Route::get('pesan/{kode_kamar}/pesan', 'BookController@edit')->name('book.kamar');
Route::post('pesan/{kode_booking}/pesan', 'BookController@pesan')->name('book.pesan');
Route::get('pesan/cancel', 'BookController@batalPesan')->name('book.cancel');

Route::get('{kode_booking}/verifikasi', 'BookController@showVerify')->name('book.verifikasi');
Route::post('{kode_booking}/verifikasi', 'BookController@verify')->name('book.inverifikasi');

Route::post('look/cari', 'LookController@search')->name('look.search');

Route::post('look/kode', 'LookController@lihat')->name('lihat.kode');

Route::post('email', 'PagesController@email')->name('mail');

Route::get('look/{kode_kamar}/pesan', 'LookController@order');

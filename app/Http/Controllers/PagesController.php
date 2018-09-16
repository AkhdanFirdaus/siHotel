<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Reservasi;
use App\Fasilitas;
use App\Kamar;
use App\Lokasi;

class PagesController extends Controller
{
	public function home() {
		$reservasi = Reservasi::simplePaginate(2);
        $types = Fasilitas::pluck('tipe', 'id');
        $rooms = Kamar::pluck('kode_kamar', 'id');
        $lokasis = Lokasi::pluck('lokasi', 'id');
		return view('welcome')->withReservasi($reservasi)->withTypes($types)->withRooms($rooms)->withLokasis($lokasis);
	}    

    public function dashboard() {
    	return view('dashboard.dashboard', ['user' => Auth::user()]);
    }

    public function book() {    	
    	return view('book.book', ['user' => Auth::user()]);
    }
}

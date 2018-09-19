<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kamar;
use App\Reservasi;
use App\Pembayaran;

class LookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($kode_booking)
    {
        $room = Kamar::find($kode_booking);
        return view('look.look')->withRoom($room);
    }

    public function order($id)
    {
        $rooms = Kamar::find($id);

        return view('book.book')->withRooms($rooms);
    }

    public function search(Request $request) {
        $this->validate($request, ['cari' => 'required']);
        $pembayaran = Pembayaran::where('kode_booking', $request->cari)->first();
        return view('look.look')->withPembayaran($pembayaran);
    }
}

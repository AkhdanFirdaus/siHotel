<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;
use App\Hotel;
use App\Pembayaran;
use App\Reservasi;
use App\User;
use Auth;
use Mail;
use Session;

class ResepsionisController extends Controller
{
    public function dashboard() {
        $reservasis = Reservasi::orderBy('created_at', 'desc');
        $guest = Guest::all();
        $user = User::all();
        $hotels = Hotel::all();

        $userRole = User::with('roles')->get();
        return view('dashboard.dashboard')->withReservasis($reservasis)->withGuest($guest)->withUser($user)->withHotels($hotels)->withUserRole($userRole);
    }    

    public function approve($kode_booking)
    {
    	$kode = substr(str_shuffle("0123456789"), 0, 5);
    	$pembayaran = Pembayaran::where('kode_booking', $kode_booking)->first();
    	$pembayaran->pin = $kode;
    	$pembayaran->save();

    	Session::flash('success', 'Berhasil di proses');
    	return redirect()->back();
    }

    public function warn($kode_booking)
    {
		$pembayaran = Pembayaran::where('kode_booking', $kode_booking)->first();
		$warning = [
			'email' => $pembayaran->reservasi->guest['email'],
			'kode_booking' => $pembayaran->kode_booking,
			'nama' => $pembayaran->reservasi->guest['nama']
		];
    	Mail::send('email.warnTemplate', $warning, function($message) use ($warning) {
            $message->from('akhdan.musyaffa.firdaus@gmail.com');
            $message->to($warning['email']);
            $message->subject('Pembayaran siHotel');
        });            
    }

    public function lookReserve() {
        $pembayaran = Pembayaran::whereNotNull('pin')->orderBy('created_at', 'desc')->get();
        $pembayaran1 = Pembayaran::whereNull('pin')->orderBy('created_at', 'desc')->get();
        return view('dashboard.dash-reservasi')->withPembayaran($pembayaran)->withPembayaran1($pembayaran1);
    }

    public function destroy($id)
    {
        $reservasi = Reservasi::find($id);
        $reservasi->delete();

        Session::flash('cancel', 'Pesan Telah di hapus');

        return redirect()->back();
    }

    public function warnMail($id)
    {
        $reservasi = Reservasi::find($id);

        if(Auth::check()) {
            $warn = [
                'nama' => Auth::user()->name,
                'kode_booking' => $reservasi->pembayaran['kode_booking'],
                'email' => Auth::user()->email,
                'check_in' => $reservasi->check_in
            ];
        } else {
            $warn = [
                'nama' => $reservasi->guest['nama'],
                'kode_booking' => $reservasi->pembayaran['kode_booking'],
                'email' => $reservasi->guest['email'],	
                'check_in' => $reservasi->check_in
            ];
        }

        Mail::send('email.warnTemplate', $warn, function($message) use ($warn) {
            $message->from('akhdan.musyaffa.firdaus@gmail.com');
            $message->to($warn['email']);
            $message->subject('Pemesanan siHotel');
        });

        Session::flash('success', 'Pesan telah terkirim');
        return redirect()->back();
    }
}

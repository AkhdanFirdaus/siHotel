<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservasi;
use App\Fasilitas;
use App\Kamar;
use App\Lokasi;
use App\Feedback;
use App\Guest;
use Auth;
use Mail;
use Session;

class PagesController extends Controller
{
	public function home() {
		$reservasi = Reservasi::orderBy('created_at', 'desc')->paginate(2);
        $rekomendasis = Kamar::orderBy('harga', 'asc')->paginate(5);
        $types = Fasilitas::pluck('tipe', 'id');
        $rooms = Kamar::pluck('kode_kamar', 'id');
        $lokasis = Lokasi::pluck('lokasi', 'id');
		return view('welcome')->withReservasi($reservasi)->withTypes($types)->withRooms($rooms)->withLokasis($lokasis)->withRekomendasis($rekomendasis);
	}    

    public function dashboard() {
        $reservasis = Reservasi::all();
    	return view('dashboard.dashboard', ['user' => Auth::user()])->withReservasis($reservasis);
    }

    public function book() {    	
    	return view('book.book', ['user' => Auth::user()]);
    }

    public function email(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'pesan' => 'required'
        ]);

        $kontak = [
            'nama' => $request->nama,
            'email' => $request->email,
            'subject' => $request->subject,
            'pesan' => $request->pesan
        ];


        Mail::send('email.contactTemplate', $kontak, function($message) use ($kontak) {
            $message->from($kontak['email']);
            $message->to('akhdan.musyaffa.firdaus@gmail.com');
            $message->subject($kontak['subject']);
        }); 
        
        $guest = new Guest();
        $guest->nama = $kontak['nama'];
        $guest->email = $kontak['email'];
        $guest->save();

        $mail = new Feedback();
        $mail->subject = $kontak['subject'];
        $mail->message = $kontak['pesan'];        
        $mail->save();

        Session::flash('success', 'Terimakasih Atas Masukkan Anda');
        return redirect()->back();
    }
}

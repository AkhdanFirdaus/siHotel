<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Auth;
use Mail;
use App\Fasilitas;
use App\Guest;
use App\Kamar;
use App\Pembayaran;
use App\Reservasi;
use App\Hotel;
use App\Lokasi;
use App\Feedback;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Fasilitas::pluck('tipe', 'id');

        $rooms = Kamar::pluck('kode_kamar', 'id');

        return view('book.book')->withTypes($types)->withRooms($rooms);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        $hotel = Hotel::where('slug', $slug)->first();
        $jmlkamar = Hotel::withCount('kamar')->where('slug', $slug)->first();
        $detail = $request->session()->get('detail');
        return view('hotel.hotel', ['hasilkamar' => $jmlkamar])->withHotel($hotel)->withDetail($detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $kode_kamar)
    {
        $kamar = Kamar::where('kode_kamar', $kode_kamar)->first();
        $detail = $request->session()->get('detail');
        $code = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8));
        $request->session()->put('kode', $code);
        $request->session()->put('kode_kamar', $kamar->kode_kamar);

        $diff = Carbon::parse($detail['checkin'])->diffInDays(Carbon::parse($detail['checkout']));
        return view('book.bookNow', ['code' => $code, 'diff' => $diff])->withKamar($kamar)->withDetail($detail);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pesan(Request $request)
    {
        if (!Auth::check()) {
            $this->validate($request, [
                'nama' => 'required',
                'email' => 'required|email',
                'kontak' => 'required',
            ]);
        }

        $kode = $request->session()->get('kode');
        $detail = $request->session()->get('detail');
        $kodeKamar = $request->session()->get('kode_kamar');
        $kode_verify = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8));
        $room = Kamar::where('kode_kamar', $kodeKamar)->first();
        
        if ($room->status == 'Tersedia') {
            if(!Auth::check()) {
                $guest = new Guest();
                $guest->nama = $request->nama;
                $guest->email = $request->email;
                $guest->kontak = $request->kontak;
                $guest->save();
            }

            $pembayaran = new Pembayaran();
            $pembayaran->kode_booking = encrypt($kode);
            $pembayaran->kode_verifikasi = encrypt($kode_verify);
            $pembayaran->no_rekening = $request->noRek;
            $pembayaran->save();

            $reserve = new Reservasi();
            
            if (Auth::check()) {
                $reserve->user()->associate(Auth::user()->id);
            }
            else {
                $reserve->guest()->associate($guest);
            }

            $reserve->check_in = $detail['checkin'];
            $reserve->check_out = $detail['checkout'];
            $reserve->jml_partisipan = $detail['jml'];
            $reserve->kamar_id = $room->id;
            $reserve->pembayaran()->associate($pembayaran);
            $reserve->save();

            $reservasi = Reservasi::orderBy('created_at', 'desc')->first();

            if (Auth::check()) {
                $reserve = [
                    'nama' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'kode_booking' => $reservasi->pembayaran['kode_booking'],
                    'kode_verifikasi' => $reservasi->pembayaran['kode_verifikasi']
                ];
            } else {
                $reserve = [
                    'nama' => $reservasi->guest['nama'],
                    'email' => $reservasi->guest['email'],
                    'kode_booking' => $reservasi->pembayaran['kode_booking'],
                    'kode_verifikasi' => $reservasi->pembayaran['kode_verifikasi']
                ];
            }       


            // Mail::send('email.verifyTemplate', $reserve, function($message) use ($reserve) {
            //     $message->from('akhdan.musyaffa.firdaus@gmail.com');
            //     $message->to($reserve['email']);
            //     $message->subject('Kode Verifikasi Hotel');
            // });      

            Session::flash('success', 'Berhasil memesan, cek email untuk verifikasi');            

            return redirect()->route('book.verifikasi', $reservasi->pembayaran['kode_booking']);
        }
        else {
            Session::flash('fail', 'Ada Kesalahan Input data');   
            return redirect()->back();
        }   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function batalPesan()
    {
        $request->session()->forget(['detail', 'kode', 'kode_kamar']);
        $request->session()->flush();

        return redirect()->route('home');
    }

    public function search(Request $request)
    {
        $request->validate([
            'lokasi' => 'required',
            'checkin' => 'required|date|date_format:Y-m-d|after:yesterday',
            'checkout' => 'required|date|date_format:Y-m-d|after:checkin',
            'jml' => 'required|gt:0'
        ]);

        $search = $request->lokasi;

        $detail = ['checkin' => $request->checkin, 'checkout' => $request->checkout, 'jml' => $request->jml];

        $request->session()->put('detail', $detail);

        $lokasis = Lokasi::find($search);
        $detail = Session::get('detail');
        $jumlahpencarian = Lokasi::withCount('hotel')->find($search);

        return view('book.bookSearch', [ 'hasil' => $jumlahpencarian])->withLokasis($lokasis)->withSearch($search)->withDetail($detail);
    }

    public function showVerify(Request $request, $kode_booking) {
        $pembayaran = Pembayaran::where('kode_booking', $kode_booking)->first();    
        $diff = Carbon::parse($pembayaran->reservasi['check_in'])->diffInDays(Carbon::parse($pembayaran->reservasi['check_out']));
        return view('book.verifikasi', ['diff' => $diff])->withPembayaran($pembayaran);
    }

    public function verify(Request $request, $kode_booking) {
        $request->validate([
            'kodenya' => 'required',
            'status' => 'required',
            'jumlah' => 'required',
            'rate' => 'required'
        ]);

        $pembayaran = Pembayaran::where('kode_booking', $kode_booking)->first();

        $setengahnya = (50/100) * $pembayaran->reservasi->kamar['harga'];

        if (decrypt($pembayaran->kode_verifikasi) == $request->kodenya) {
            if ($request->jumlah < $setengahnya) {
                Session::flash('fail', 'Nominal minimal 50% dari harga sewa');
                return redirect()->back();
            } else {
                $feedback = new Feedback();
                $feedback->subject = 'Review';
                $feedback->message = $request->note;
                $feedback->rating = $request->rate;
                $feedback->save();

                
                $pembayaran->reservasi->feedback()->associate($feedback);
                $pembayaran->save();


                                

                if ($request->jumlah >= $setengahnya && $request->jumlah < $pembayaran->reservasi->kamar['harga']) {
                    $status = 'Uang Muka';
                } else {                    
                    $status = 'Lunas';
                }
                $pembayaran->reservasi->kamar->update('kamar', 'Terisi');
                $pembayaran->update([
                    'status' => $status,         
                    'jumlahPembayaran' => $request->jumlah
                ]);

                Session::flash('success', 'Terimakasih telah memesan hotel di siHotel, silahkan masukkan kode booking anda untuk mendapatkan password kamar');
                return redirect()->route('home');
            }            
        } else {
            Session::flash('fail', 'Kode Verifikasi Salah');
            return redirect()->back();
        }
    }
}

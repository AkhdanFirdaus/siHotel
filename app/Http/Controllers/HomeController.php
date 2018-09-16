<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservasi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['General Manager', 'Head Receptionist', 'Resepsionis']);
        return view('home');
    }

    public function email(Request $request)
    {
        
        return redirect()->route('home');
    }

    public function dashboard() {
        $reservasis = Reservasi::all();
        return view('dashboard.dashboard')->withReservasis($reservasis);
    }
}

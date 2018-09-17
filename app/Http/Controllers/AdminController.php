<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservasi;
use App\Guest;
use App\User;
use App\Hotel;

class AdminController extends Controller
{
	public function dashboard() {
        // $request->user()->authorizeRoles(['General Manager', 'Head Receptionist', 'Resepsionis']);
        $reservasis = Reservasi::all();
        $guest = Guest::all();
        $user = User::all();
        $hotels = Hotel::all();

        $userRole = User::with('roles')->get();
        return view('dashboard.dashboard')->withReservasis($reservasis)->withGuest($guest)->withUser($user)->withHotels($hotels)->withUserRole($userRole);
    }    

    public function approve($kode_booking)
    {
    	$kode = substr(str_shuffle("0123456789"), 0, 5);
    }
}

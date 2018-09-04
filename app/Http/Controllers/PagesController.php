<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PagesController extends Controller
{
    public function dashboard() {
    	return view('dashboard.dashboard', ['user' => Auth::user()]);
    }

    public function book() {
    	return view('book.book', ['user' => Auth::user()]);
    }
}

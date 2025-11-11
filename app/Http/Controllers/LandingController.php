<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index() {
        return view('LandingPage');
    }

    public function requirement() {
        return view('s&k');
    }

    public function kontak(){
        return view('kontak');
    }
}

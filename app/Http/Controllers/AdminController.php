<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function kelola_pengguna() {
        return view('Admin.kelola_pengguna');
    }
}

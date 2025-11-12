<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function kelola_pengguna() {
        $users = User::all();
        return view('Admin.kelola_pengguna', compact('users'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PPATController extends Controller
{
    public function pengajuan(){
        return view('ppat.pengajuan');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(){
        return view('beranda.index');
    }

    public function berandaguru(){
        return view('beranda.berandaguru');
    }

    public function berandasiswa(){
        return view('beranda.berandasiswa');
    }
}

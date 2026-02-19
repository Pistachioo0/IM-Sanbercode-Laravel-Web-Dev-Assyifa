<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

abstract class Controller
{
    public function regis() {
    return view('form');
}

    public function selamat() {
    return view('welcomeX');
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function regis() {
    return view('page.form');
}

    public function selamatDatang(Request $data) {
        $nama_pertama = $data->input('nama_p');
        $nama_terakhir = $data->input('nama_t');

    return view('page.welcomeX', [
        'nama_awal' => $nama_pertama,
        'nama_akhir' => $nama_terakhir
    ]);
}
}

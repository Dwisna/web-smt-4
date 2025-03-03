<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    // Menampilkan segment URL kedua
    public function index(Request $request)
    {
        return $request->segment(2);
    }

    // Menampilkan formulir
    public function formulir()
    {
        return view('formulir');
    }

    // Memproses data dari formulir
    public function proses(Request $request)
    {
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');

        return "Nama: " . $nama . ", Alamat: " . $alamat;
    }
}

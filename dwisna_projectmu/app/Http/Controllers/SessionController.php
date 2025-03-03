<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    // Menambahkan data ke dalam session
    public function create(Request $request)
    {
        $request->session()->put('nama', 'Politeknik Negeri Jember');
        return "Data telah ditambahkan ke session.";
    }

    // Menampilkan isi session
    public function show(Request $request)
    {
        if ($request->session()->has('nama')) {
            return $request->session()->get('nama');
        } else {
            return 'Tidak ada data dalam session.';
        }
    }

    // Menghapus session
    public function delete(Request $request)
    {
        $request->session()->forget('nama');
        return "Data telah dihapus dari session.";
    }
}

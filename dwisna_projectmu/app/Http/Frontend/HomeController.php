<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller; // Memastikan Controller diimpor dengan benar
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('frontend.home');
    }
}

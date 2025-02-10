<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
class UserController extends Controller
{
    public function index()
    {
        return "ini adalah halaman pengguna";
    }
    public function show()
    {
        return "ini adalah halaman profil pengguna";
    }
}
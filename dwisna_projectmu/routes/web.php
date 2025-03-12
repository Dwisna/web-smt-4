<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PendidikanController;
use App\Http\Controllers\Backend\PengalamanKerjaController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ManagementUserController;

// Acara 1: Rute dasar
Route::get('/', function () {
    return view('welcome');
});

Route::get('/foo', function () {
    return 'hello world';
});

Route::get('/user/{id}', function ($id) {
    return 'user ' . $id;
});

// Acara 2: Menggunakan controller
Route::get('/user','UserController@index');
// Route::get('/user', [CustomerController::class, 'index']);
// Acara 3: Redirect
Route::redirect('/coba', '/sini');

// Acara 4: Profil dengan view
Route::get('/profile', function () {
    return view('welcome', [
        'nama' => 'Dwisna Risma',
        'nim' => 'E41230674',
        'jurusan' => 'Teknologi Informasi'
    ]);
});

// Acara 5: Resource controller
Route::get('/user7', [ManagementUserController::class, 'index']);
Route::resource('/user', ManagementUserController::class);

// Acara 6: Route ke halaman home
Route::get("/homee", function(){
    return view("homee");
});

// // Acara 7: Grouping route frontend
Route::group(['namespace' => 'App\Http\Controllers\Frontend'], function(){
    Route::resource('/home', HomeController::class);
});
Route::resource('/home', HomeController::class);

// Acara 8: Grouping route backend
Route::resource('/dashboard', DashboardController::class);

// Acara 13: Grouping route backend lanjutan
Route::resource('/pendidikan', PendidikanController::class);
Route::resource('/pengalaman_kerja', PengalamanKerjaController::class);

// Acara 15: Middleware backend
Route::get('/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');
Route::get('/pengalaman-kerja', [PengalamanKerjaController::class, 'index'])->name('pengalaman_kerja.index');

// Acara 17: Session & PegawaiController
Route::get('/session/create', [SessionController::class, 'create']);
Route::get('/session/show', [SessionController::class, 'show']);
Route::get('/session/delete', [SessionController::class, 'delete']);
Route::get('/pegawai/{nama}', [PegawaiController::class, 'index']);
Route::get('/formulir', [PegawaiController::class, 'formulir']);
Route::match(['get', 'post'], '/formulir/proses', [PegawaiController::class, 'proses']);

// Acara 18: Error Handling
Route::get('/coberror', [CobaController::class, 'index']);

// Acara 19: Upload File
Route::get('/upload', [UploadController::class, 'upload'])->name('upload');
Route::post('/upload/proses', [UploadController::class, 'proses_upload'])->name('upload.proses');
Route::post('/upload/resize', [UploadController::class, 'resize_upload'])->name('upload.resize');

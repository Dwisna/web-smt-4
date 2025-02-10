<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rute dasar
Route::get('/', function () {
    return view('welcome');
});

Route::get('/foo', function () {
    return 'hello world';
});

Route::get('/user/{id}', function ($id) {
    return 'user ' . $id;
});

// Menggunakan controller
Route::get('/user','UserController@index');
// Route::get('/user', [CustomerController::class, 'index']);

// Route::get($uri, $callback);
// Route::post($uri, $callback);
// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::options($uri, $callback);

// Redirect
Route::redirect('/coba', '/sini');

// Profil dengan view
Route::get('/profile', function () {
    return view('welcome', [
        'nama' => 'Dwisna Risma',
        'nim' => 'E41230674',
        'jurusan' => 'Teknologi Informasi'
    ]);
});

Route::get('/userr/{name?}', function ($name = null){
    return $name? "Selamat datang, $name!" : "Selamat datang, guys";
});

Route::get('/userrs/{name?}', function($name='dwisna'){
    return $name? "Selamat datang, $name!" : "Selamat datang, guys";
});

Route::get('user1/{name}', function ($name){
    return "Hello, $name!";
})->where('name', '[A-Za-z}+');

Route::get('user2/{id}', function($id){
    return "User ID: $id";
})->where('id', '[0-9]+');

Route::get('user3/{id}/{name}', function ($id, $name){
    return "User ID: $id, Name: $name";
})->where(['id' => '[0-9]+','name' => '[a-z]+']);

Route::get('search/{search}', function ($search){
    return $search;
})->where('search', '.*');

use App\Http\Controllers\UserProfileController;

Route::get('user5/profile', function(){
    return "Ini adalah halaman profil pengguna 5";
})->name('profile.user5');

Route::get('user6/profile', [UserProfileController::class, 'show'])->name('profile.user6');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GalleryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
})->name('landing');
Route::get('/layout', function() {
    return view('auth.layout');
});
Route::get('/beranda', function(){
    return view('beranda');
});

Route::controller(AuthenticationController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('authenticate', 'authenticate')->name('authenticate');
    Route::get('/home', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(PostController::class)->group(function() {
    Route::get('/users', 'index')->name('users');
    Route::get('/users/edit/{id}', 'edit')->name('edit');
    Route::post('/users/delete/{id}', 'destroy')->name('destroy');
    Route::post('/users/update/{id}', 'update')->name('update');
});

Route::resource('gallery', GalleryController::class);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\PostController;

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
    return view('welcome');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/send-email', [SendEmailController::class, 'index'])->name('kirim-email');
Route::post('/post-email', [SendEmailController::class, 'store'])->name('post-email');

Route::controller(PostController::class)->group(function() {
    Route::get('/users', 'index')->name('users');
    Route::get('/users/edit/{id}', 'edit')->name('edit');
    Route::post('/users/delete/{id}', 'destroy')->name('destroy');
    Route::post('/users/update/{id}', 'update')->name('update');
});
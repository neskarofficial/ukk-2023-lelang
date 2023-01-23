<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('template', 'template.master')->middleware('auth');

Route::get('register', [RegisterController::class, 'view'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register-store');
Route::get('login', [LoginController::class, 'view'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'autheticatePetugas'])->name('login-petugas-auth');
Route::get('logout', [LoginController::class, 'logout'])->name('logout-petugas');

Route::view('dashboard', 'dashboard.index')->name('dashboard-petugas')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::controller(BarangController::class)->group(function() {
        Route::get('/barang', 'index')->name('barang.index');
        Route::get('/barang/create', 'create')->name('barang.create');
        Route::post('/barang', 'store')->name('barang.store');
        Route::get('/barang/{barang}', 'show')->name('barang.show');
        Route::get('/barang/{barang}/edit', 'edit')->name('barang.edit');
        Route::put('/barang/{barang}', 'update')->name('barang.update');
        Route::delete('/barang/{barang}', 'destroy')->name('barang.destroy');
    });
});



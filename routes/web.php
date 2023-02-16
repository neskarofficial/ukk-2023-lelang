<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\HistoryLelangController;




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

Route::redirect('/', '/login', 301);

Route::get('register', [RegisterController::class, 'view'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register-store')->middleware('guest');
Route::get('login', [LoginController::class, 'view'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'autheticatePetugas'])->name('login-petugas-auth');

Route::get('logout', [LoginController::class, 'logout'])->name('logout-petugas');

// middleware auth, level admin & petugas
Route::middleware(['auth', 'level:admin,petugas'])->group(function () {
    Route::controller(BarangController::class)->group(function() {
        Route::get('barang', 'index')->name('barang.index');
        Route::get('barang/create', 'create')->name('barang.create');
        Route::post('barang', 'store')->name('barang.store');
        Route::get('barang/{barang}', 'show')->name('barang.show');
        Route::get('barang/{barang}/edit', 'edit')->name('barang.edit');
        Route::put('barang/{barang}', 'update')->name('barang.update');
        Route::delete('barang/{barang}', 'destroy')->name('barang.destroy');
    });
});

// Middleware only admin
Route::middleware(['auth', 'level:admin'])->group(function () {
    Route::redirect('/admin', 'admin/dashboard', 301);
    Route::view('dashboard/admin', 'dashboard.admin')->name('admin.dashboard');
});


// Middleware only petugas
Route::middleware(['auth', 'level:petugas'])->group(function () {
    Route::view('dashboard/petugas', 'dashboard.petugas')->name('petugas.dashboard');  
    Route::controller(LelangController::class)->group(function() {
        Route::get('lelang', 'index')->name('lelang.index');
        Route::get('lelang/create', 'create')->name('lelang.create');
        Route::post('lelang', 'store')->name('lelang.store');
        Route::get('lelang/{lelang}', 'show')->name('lelang.show');
        Route::get('lelang/{lelang}/edit', 'edit')->name('lelang.edit');
        Route::put('lelang/{lelang}', 'update')->name('lelang.update');
        Route::delete('lelang/{lelang}', 'destroy')->name('lelang.destroy');
    });
});

//Only Masyarakat
Route::middleware(['auth', 'level:masyarakat'])->group(function () {
    Route::view('home', 'dashboard.masyarakat')->name('masyarakat.dashboard');
    Route::get('lelangs/list', [LelangController::class, 'masyarakatList'])->name('lelang.masyarakat.list');
    Route::get('lelangs/{lelang}/penarawan', [HistoryLelangController::class, 'create'])->name('lelang.masyarakat.penawaran');
    Route::post('lelangs/{lelang}/penarawan', [HistoryLelangController::class, 'store'])->name('lelang.masyarakat.penawaran.store');

});


Route::prefix('error')->group(function () {
    Route::view('403', 'error.403')->name('error.403');
});






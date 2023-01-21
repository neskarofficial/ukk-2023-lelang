<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

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
Route::view('dashboard', 'dashboard.index');

Route::view('/masyarakat/login', 'dashboard.index')->name('login-masyarakat');

Route::prefix('petugas')->group(function () {
    Route::view('/login', 'dashboard.index')->name('login-petugas');
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


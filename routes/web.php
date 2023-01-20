<?php

use Illuminate\Support\Facades\Route;

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
});


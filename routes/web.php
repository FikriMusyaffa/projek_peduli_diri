<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\perjalananController;
use App\Http\Controllers\loginController;
use App\Models\User;
use App\Models\Perjalanan;

// Dashboard
Route::get('/', function () {
    return view('pages.dashboard');
})->middleware('auth');

// Tabel Data Perjalanan
Route::get('/tabel-data-perjalanan', [perjalananController::class, 'index'])->name('data-perjalanan')->middleware('auth');

// Input Data Perjalanan
Route::get('/input-data-perjalanan',[perjalananController::class, 'perjalanan'])->middleware('auth');
Route::post('/simpanPerjalanan', [perjalananController::class, "simpanPerjalanan"])->middleware('auth');

// Register
Route::get('/register', [userController::class, "halamanRegister"]);
Route::post('/simpanUser', [userController::class, "simpanRegister"]);

// Login
Route::get('/login', [loginController::class, 'loginPage'])->name('login');
Route::any('/post-login', [loginController::class, 'Login']);

// Logout
Route::get('/logout', [loginController::class, 'LogOut']);

// Search bar Dashboard
Route::get('/cari',[perjalananController::class, 'cariPerjalanan'])->middleware('auth');

// Order by
Route::get('/sortby',[perjalananController::class, 'urutkanPerjalanan'])->middleware('auth');

// Edit data
Route::post('/editData', [perjalananController::class, 'editData'])->middleware('auth');
Route::post('/simpanEdit',[perjalananController::class, 'simpanEdit'])->middleware('auth');

// Hapus data
Route::post('/hapusData',[perjalananController::class, 'hapusData'])->middleware('auth');


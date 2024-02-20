<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RegisterController;
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



Route::get('/', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/menu',[MenuController::class, 'index'])->name('menu.index');

Route::get('/pesanan',[PesananController::class, 'index'])->name('pesanan.index');
Route::post('/pesanan',[PesananController::class, 'store'])->name('pesanan.store');
Route::delete('/pesanan/{id}',[PesananController::class, 'destroy'])->name('pesanan.destroy');
Route::post('/pesanan/checkout', [PesananController::class, 'checkout'])->name('pesanan.checkout');
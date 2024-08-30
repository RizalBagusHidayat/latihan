<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\satuanController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\barangmasukController;
use App\Http\Controllers\jenisbarangController;
use App\Http\Controllers\barangkeluarController;
use App\Http\Controllers\daftarbarangController;

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
})->name('welcome');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

Route::get('/daftarbarang', [daftarbarangController::class, 'index'])->name('daftarbarang');
Route::post('/daftarbarang/store', [daftarbarangController::class, 'store'])->name('daftarbarang.store');
// Route::post('/daftarbarang/delete', [daftarbarangController::class, 'delete'])->name('daftarbarang.delete');
Route::delete('/daftarbarang/destroy/{id_barang}', [daftarbarangController::class, 'destroy'])->name('daftarbarang.destroy');
Route::post('/daftarbarang/update', [daftarbarangController::class, 'update'])->name('daftarbarang.update');
Route::get('/daftarbarang/update/{id}', [daftarbarangController::class, 'update_item'])->name('daftarbarang.update_item');

Route::get('/barangmasuk', [barangmasukController::class, 'index'])->name('barangmasuk');
Route::get('/barangkeluar', [barangkeluarController::class, 'index'])->name('barangkeluar');
Route::get('/jenisbarang', [jenisbarangController::class, 'index'])->name('jenisbarang');
Route::get('/satuan', [satuanController::class, 'index'])->name('satuan');



<?php

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\satuanController;
use App\Http\Controllers\daftarbarangController;
use App\Http\Controllers\jenisbarangController;
use App\Models\JenisBarang;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/post', function () {
    $daftarbarang = Barang::all();
    return Barang::collection($daftarbarang);
});

Route::get('/getBarang', [daftarbarangController::class, 'getBarang_api']);

Route::get('/getSatuan', [satuanController::class, 'getSatuan_api']);

Route::get('/getJenisBarang', [jenisbarangController::class, 'getJenisBarang_api']);

Route::post('/storeBarang', [daftarbarangController::class, 'store_api']);

Route::post('/updateBarang', [daftarbarangController::class, 'update_api']);

Route::delete('/destroyBarang/{id_barang}', [daftarbarangController::class, 'destroy_api']);

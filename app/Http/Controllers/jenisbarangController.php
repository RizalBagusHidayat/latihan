<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\JenisBarangResource;
use App\Models\jenisBarang;

class jenisbarangController extends Controller
{
    public function index() {
        return view('jenisbarang');
    }

    public static function getJenisBarang_api() {
        $jenisbarang = jenisBarang::all();
        return JenisBarangResource::collection($jenisbarang);
    }
}

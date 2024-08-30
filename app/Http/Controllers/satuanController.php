<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SatuanResource;
use App\Models\satuan;

class satuanController extends Controller
{
    public function index() {
        return view('satuan');
    }

    public static function getSatuan_api() {
        $satuan = satuan::all();
        return SatuanResource::collection($satuan);
    }
}

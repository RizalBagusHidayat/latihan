<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\satuan;
use App\Models\JenisBarang;
use Illuminate\Http\Request;

class daftarbarangController extends Controller
{
    public function index() {
        
        $barang = Barang::all();
        $jenisbarang = JenisBarang::all();
        $satuan = satuan::all();

        return view('daftarbarang', compact('barang', 'jenisbarang', 'satuan'));
    }
    public static function store(Request $request) {

        $request->validate([
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
        ]);

        Barang::create($request->all());
        return redirect(route('daftarbarang'))->with('success', 'Barang berhasil ditambahkan');
    }
    
}

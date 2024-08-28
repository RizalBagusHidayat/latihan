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
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
        ]);
        $barang = new Barang();
        $barang->id_barang = $request->id_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->jenis_id = intval($request->jenis_barang);
        $barang->satuan_id = intval($request->satuan);
        $barang->stok = $request->stok;
        $barang->save();

        return redirect(route('daftarbarang'))->with('success', 'Barang berhasil ditambahkan');
    }
    
    public static function edit(Request $request) {
        
        $request->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
        ]);
        $barang = Barang::where('id_barang',$request->id_barang)->first();
        $barang->nama_barang = $request->nama_barang;
        $barang->jenis_id = intval($request->jenis_barang);
        $barang->satuan_id = intval($request->satuan);
        $barang->stok = $request->stok;
        $barang->save();
        return redirect(route('daftarbarang'))->with('success', 'Barang berhasil diubah');
    }
    public static function edit_api($id) {
        $barang = Barang::find($id);
        return response()->json($barang);
    }

    public static function delete($id_barang) { 
        // $id = request('id');
        $barang = Barang::where('id_barang', $id_barang)->firstOrFail();
        // dd($barang);
        // $barang = Barang::where('id_barang',$id);
        $barang->delete();
        return redirect(route('daftarbarang'))->with('success', 'Barang berhasil dihapus');
    }
}

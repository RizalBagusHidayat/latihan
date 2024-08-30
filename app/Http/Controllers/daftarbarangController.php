<?php

namespace App\Http\Controllers;

use App\Http\Resources\BarangResource;
use App\Http\Resources\JenisBarangResource;
use App\Http\Resources\SatuanResource;
use App\Models\Barang;
use App\Models\satuan;
use App\Models\JenisBarang;
use Illuminate\Http\Request;

class daftarbarangController extends Controller
{
    public function index() {

        $curlBarang = curl_init();
        curl_setopt_array($curlBarang, array(
            CURLOPT_URL => '127.0.0.1/latihan/public/api/getBarang',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $responseBarang = curl_exec($curlBarang);
        curl_close($curlBarang);
        $barang = json_decode($responseBarang, true);
    
        $curlSatuan = curl_init();
        curl_setopt_array($curlSatuan, array(
            CURLOPT_URL => '127.0.0.1/latihan/public/api/getSatuan',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $responseSatuan = curl_exec($curlSatuan);
        curl_close($curlSatuan);
        $satuan = json_decode($responseSatuan, true);
    
        $curlJenisBarang = curl_init();
        curl_setopt_array($curlJenisBarang, array(
            CURLOPT_URL => '127.0.0.1/latihan/public/api/getJenisBarang',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $responseJenisBarang = curl_exec($curlJenisBarang);
        curl_close($curlJenisBarang);
        $jenisbarang = json_decode($responseJenisBarang, true);
    
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

        $data = [
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
        ];
    
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => '127.0.0.1/latihan/public/api/storeBarang',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        return redirect(route('daftarbarang'))->with('success', 'Barang berhasil ditambahkan');
    }
    
    public static function update(Request $request) {
        
        $request->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
        ]);
    
        // Prepare data for the API request
        $data = [
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => intval($request->jenis_barang),
            'stok' => $request->stok,
            'satuan' => intval($request->satuan),
        ];
    
        // Initialize cURL
        $curl = curl_init();
    
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://127.0.0.1/latihan/public/api/updateBarang',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json',
                // 'Authorization: Bearer your_api_token_here' // Uncomment if API requires authorization
            ),
        ));
    
        // Execute cURL request and fetch response
        $response = curl_exec($curl);
        
        return redirect(route('daftarbarang'))->with('success', 'Barang berhasil diubah');
    }
    public static function update_item($id) {
        $barang = Barang::find($id);
        return response()->json($barang);
    }

    public static function destroy($id_barang) { 
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://127.0.0.1/latihan/public/api/destroyBarang/' . urlencode($id_barang),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return redirect(route('daftarbarang'))->with('success', 'Barang berhasil dihapus');
    }

public static function getBarang_api() {
        $barang = Barang::all();
        return BarangResource::collection($barang);
    }

    public static function store_api(Request $request) {
        $barang = new Barang();
        $barang->id_barang = $request->id_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->jenis_id = intval($request->jenis_barang);
        $barang->satuan_id = intval($request->satuan);
        $barang->stok = $request->stok;
        $barang->save();

        return response()->json($barang);
    }

    public function update_api(Request $request) {
        // Validate the request input
        $request->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
        ]);
    
        // Find the Barang record by id_barang
        $barang = Barang::where('id_barang', $request->id_barang)->first();
        // dd($barang);
        // Check if the Barang record exists
        if (!$barang) {
            return response()->json(['message' => 'Barang not found'], 404);
        }
    
        // Update the Barang record
        $barang->nama_barang = $request->nama_barang;
        $barang->jenis_id = intval($request->jenis_barang);
        $barang->satuan_id = intval($request->satuan);
        $barang->stok = $request->stok;
        $barang->save();
    
        // Return a JSON response indicating success
        return response()->json(['message' => 'Barang berhasil diubah', 'barang' => $barang], 200);
    }
    
    public static function destroy_api($id_barang) {
        $barang = Barang::where('id_barang', $id_barang)->firstOrFail();
        $barang->delete();
        return response()->json(['message' => 'Barang deleted successfully']);
    }

}

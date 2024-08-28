<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barang')->insert([
            'id_barang' => 'A00001',
            'nama_barang' => 'HP 15s',
            'jenis_id' => 1,
            'satuan_id' => 1,
            'stok' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('barang')->insert([
            'id_barang' => 'A00002',
            'nama_barang' => 'Le Minerale 600 mL',
            'jenis_id' => 3,
            'satuan_id' => 5,
            'stok' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('barang')->insert([
            'id_barang' => 'A00003',
            'nama_barang' => 'VIT 600 mL',
            'jenis_id' => 3,
            'satuan_id' => 5,
            'stok' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

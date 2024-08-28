<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Elektronik' , 'Furniture' , 'Lainnya'];

        foreach ($data as $key => $value) {
            DB::table('jenis_barang')->insert([
                'jenis_barang' => $value,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

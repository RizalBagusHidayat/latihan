<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Kg' , 'Ons' , 'gr', 'Liter', 'Pcs', 'Lusin' ];

        foreach ($data as $key => $value) {
            DB::table('satuan')->insert([
                'satuan' => $value,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

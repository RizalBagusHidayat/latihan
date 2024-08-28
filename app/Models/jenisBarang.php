<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'jenis_barang';

    // Relasi ke Barang (One to Many)
    public function barang()
    {
        return $this->hasMany(Barang::class, 'jenis_barang_id');
    }

    
}

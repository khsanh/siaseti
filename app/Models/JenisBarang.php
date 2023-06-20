<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    protected $table = 'jenis_barang';
    protected $primarykey = 'id';
    protected $fillable = [
        'kode_jenis_barang',
        'nama_barang',
    ];
    public function detail_aset()
    {
        return $this->hasMany(DetailAset::class);
    }
    public function mutasi()
    {
        return $this->hasMany(DetailAset::class);
    }
}



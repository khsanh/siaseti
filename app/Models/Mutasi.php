<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    protected $table = 'mutasi';
    protected $primarykey = 'id';
    protected $fillable = [
        'id_detail_aset',
        'id_berita_acara',
        'lokasi_lama',
        'kode_aset_lama',
        'tgl_mutasi',
    ];
    public function detail_aset()
    {
        return $this->belongsTo(DetailAset::class, 'id_detail_aset');
    }
    public function berita_acara()
    {
        return $this->belongsTo(BeritaAcara::class, 'id_berita_acara');
    }
    public function lok_lama()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi_lama');
    }
    
}

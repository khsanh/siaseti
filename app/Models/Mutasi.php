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
    public function detailAset()
    {
        return $this->belongsTo(DetailAset::class, 'id_detail_aset');
    }
    public function berita_acara()
    {
        return $this->belongsTo(BeritaAcara::class, 'id_berita_acara');
    }
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_lama', 'id');
    }
    
}

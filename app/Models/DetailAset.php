<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAset extends Model
{
    protected $table = 'detail_aset';
    protected $primarykey = 'id';
    protected $fillable = [
        'nomor_aset',
        'kode_aset',
        'qr_code',
        'kategori_aset',
        'deskripsi_aset',
        'merek_aset',
        'tgl_kapitalisasi',
        'kondisi',
        'status_aset',
        'id_lokasi',
        'id_jenis_barang',
        'asal_perusahaan',
        'bast',
        'sertifikat',
        'pic_aset',
        'nomor_kartu_aset',
        'foto_aset',
        'pj_edit',
        'tgl_edit'
    ];
    public function jenis_barang()
    {
        return $this->belongsTo(JenisBarang::class, 'id_jenis_barang', 'id');
    }
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi', 'id');
    }
    public function divisi()
    {
        return $this->belongsTo(Lokasi::class, 'id_divisi', 'id');
    }
    public function monitoring()
    {
        return $this->hasMany(Monitoring::class);
    }
}

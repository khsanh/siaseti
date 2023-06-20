<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';
    protected $primarykey = 'id';
    protected $fillable = [
        'kode_lokasi',
        'nama_lokasi',
        'id_divisi',
        'detail_lokasi'
    ];
    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'id_divisi', 'id');
    }
}




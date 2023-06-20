<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    protected $table = 'monitoring';
    protected $primarykey = 'id';
    protected $fillable = [
        'id_detail_aset',
        'tanggal_monitoring',
        'deskripsi',
        'id_penanggung_jawab',
    ];
    
    public function detailAset()
    {
        return $this->belongsTo(DetailAset::class, 'id_detail_aset');
    }
    public function penanggungJawab()
    {
        return $this->belongsTo(PenanggungJawab::class, 'id_penanggung_jawab');
    }
}

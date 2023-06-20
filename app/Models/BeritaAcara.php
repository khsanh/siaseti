<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcara extends Model
{
    protected $table = 'berita_acara';
    protected $primarykey = 'id';
    protected $fillable = [
        'id_memo',
        'kode_berita_acara',
        'tanggal_berita_acara',
        'perihal',
        'deskripsi',
    ];
    public function memo()
    {
        return $this->belongsTo(Memo::class, 'id_memo');
    }
}

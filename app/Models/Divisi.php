<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'divisi';
    protected $primarykey = 'id';
    protected $fillable = [
        'nama_divisi'
    ];
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}

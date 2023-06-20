<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $table = 'memo';
    protected $primarykey = 'id';
    protected $fillable = [
        'penerima',
        'pengirim',
        'kode_memo',
        'tanggal_memo',
        'perihal',
        'deskripsi',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'pengirim');
    }
    public function userr()
    {
        return $this->belongsTo(User::class, 'penerima');
    }
}

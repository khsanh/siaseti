<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenanggungJawab extends Model
{
    protected $table = 'penanggung_jawab';
    protected $primarykey = 'id';
    protected $fillable = [
        'nip',
        'nama'
    ];
    public function Monitoring()
    {
        return $this->hasMany(Monitoring::class);
    }
    
}

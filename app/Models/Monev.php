<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monev extends Model
{
    Use HasFactory;
    protected $table = 'monevs';
    protected $fillable = [
        'id_strategi',
        'id_opd',
        'id_renja',
        'anggaran',
        'sumberdana',
        'dokumen_anggaran',
        'realisasi',
        'volumeTarget',
        'satuan_realisasi',
        'pesan',
        'status',
        'uraian',
        'is_locked',
    ];

    public function ProgresKerja()
    {
         return $this->hasMany(Monev::class, 'id_monev' ,'id');
    }
}

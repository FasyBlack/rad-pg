<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaKerja extends Model
{
    Use HasFactory;
    protected $table = 'rencana_kerjas';
    protected $fillable = [
        'id_strategi',
        'id_opd',
        'rencana_aksi',
        'kegiatan',
        'sub_kegiatan',
        'nama_program',
        'lokasi',
        'volume',
        'satuan',
        'anggaran',
        'sumberdana',
        'tahun',
        'keterangan',
        'is_locked',
    ];

    public function strategi()
    {
        return $this->belongsTo(Strategi::class, 'id_strategi', 'id');
    }
    public function opd()
    {
        return $this->belongsTo(Opd::class, 'id_opd','id');
    }

     public function monev()
    {
        return $this->hasMany(Monev::class, 'id_monev' ,'id');
    }
}

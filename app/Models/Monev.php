<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monev extends Model
{
    use HasFactory;
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

     protected $casts = [
        'dokumen_anggaran' => 'array',
        'realisasi'        => 'array',
        'volumeTarget'     => 'array',
        'satuan_realisasi'     => 'array',
        'uraian'     => 'array',

    ];
    protected function dokumenAnggaran(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true) ?? [],
        );
    }

    public function ProgresKerja()
    {
        return $this->hasMany(Monev::class, 'id_monev', 'id');
    }
    public function strategi()
    {
        return $this->belongsTo(Strategi::class, 'id_strategi', 'id');
    }
    public function opd()
    {
        return $this->belongsTo(Opd::class, 'id_opd', 'id');
    }
    public function rencanaKerja()
    {
        return $this->belongsTo(RencanaKerja::class, 'id_renja', 'id');
    }
}

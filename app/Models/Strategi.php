<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strategi extends Model
{
    Use HasFactory;
    protected $table = 'strategis';
    protected $fillable = [
        'program',
        'strategi',
        'keterangan',
    ];

    public function rencanaAksi()
    {
        return $this->hasMany(RencanaAksi::class, 'id_strategi' ,'id');
    }
    public function rencanaKerja()
    {
        return $this->hasMany(RencanaKerja::class, 'id_strategi' ,'id');
    }
    public function monev()
    {
        return $this->hasMany(Monev::class, 'id_strategi' ,'id');
    }
}

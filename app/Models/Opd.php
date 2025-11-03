<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
    Use HasFactory;
    protected $table = 'opds';
    protected $fillable = ['opd', 'status'];

      public function rencanaAksi()
    {
        return $this->hasMany(RencanaAksi::class, 'id_opd', 'id');
    }
      public function rencanaKerja()
    {
        return $this->hasMany(RencanaKerja::class, 'id_opd', 'id');
    }
}

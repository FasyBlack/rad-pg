<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresKerja extends Model
{
    Use HasFactory;
    protected $table = 'progres_kerjas';
    protected $fillable = [
        'id_monev',
        'status',
    ];

    public function monev()
    {
         return $this->belongsTo(Monev::class, 'id_monev' ,'id');
    }
}

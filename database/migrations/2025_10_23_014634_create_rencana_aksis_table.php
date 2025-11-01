<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rencana_aksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_strategi')->references('id')->on('strategis')->onDelete('cascade');
            $table->foreignId('id_opd')->references('id')->on('opds')->onDelete('cascade');
             $table->foreignId('id_renja')->references('id')->on('rencana_kerjas')->onDelete('cascade');
            $table->string('rencana_aksi');
            $table->longText('kegiatan');
            $table->longText('sub_kegiatan');
            $table->longText('nama_program');
            $table->string('lokasi');
            $table->string('volume');
            $table->string('satuan');
            $table->string('anggaran');
            $table->string('sumberdana');
            $table->string('tahun');
            $table->string('status')->default('Belum Divalidasi');
            $table->longText('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencana_aksis');
    }
};

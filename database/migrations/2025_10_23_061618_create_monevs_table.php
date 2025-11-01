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
        Schema::create('monevs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_strategi')->references('id')->on('strategis')->onDelete('cascade');
            $table->foreignId('id_opd')->references('id')->on('opds')->onDelete('cascade');
            $table->foreignId('id_renja')->references('id')->on('rencana_kerjas')->onDelete('cascade');

            $table->string('anggaran');
            $table->string('sumberdana');
            $table->json('dokumen_anggaran')->nullable();
            $table->json('realisasi')->nullable();
            $table->json('volumeTarget')->nullable();
            $table->json('satuan_realisasi')->nullable();
            $table->string('pesan')->nullable();
            $table->string('status')->default('Belum divalidasi');
            $table->json('uraian')->nullable();
            $table->boolean('is_locked')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monevs');
    }
};

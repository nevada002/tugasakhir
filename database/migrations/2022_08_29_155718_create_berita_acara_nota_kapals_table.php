<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita_acara_nota_kapals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nota_id')->nullabel()->constrained('nota_kapals');
            $table->string('nomor_surat');
            $table->string('tanggal');
            $table->string('nama_perusahaan');
            $table->string('no_surat_perusahaan');
            $table->date('tanggal_surat');
            $table->string('perihal');
            $table->string('dibuatoleh');
            $table->string('keterangan');
            $table->text('lampiranpendukung');
            $table->unsignedBigInteger('penanda_tangan_id');
            $table->tinyInteger('penanda_tangan_status')->nullable();
            $table->timestamp('penanda_tangan_time')->nullable();
            $table->unsignedBigInteger('pihak_verifikasi_id');
            $table->tinyInteger('pihak_verifikasi_status')->nullable();
            $table->timestamp('pihak_verifikasi_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berita_acara_nota_kapals');
    }
};

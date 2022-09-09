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
        Schema::create('berita_acara_nota_ppkbs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nota_ppkb_id')->nullabel()->constrained('nota_ppkbs');
            $table->string('nomor_surat');
            $table->date('tanggal');
            $table->string('nama_perusahaan');
            $table->string('nama_kapal');
            $table->string('noppkb');
            $table->string('service_code');
            $table->string('noukk');
            $table->string('agen');
            $table->string('lokasi');
            $table->string('tujuan');
            $table->string('dibuatoleh');
            $table->text('alasan');
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
        Schema::dropIfExists('berita_acara_nota_ppkbs');
    }
};

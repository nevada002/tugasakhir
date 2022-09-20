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
        Schema::create('berita_acara_nota_sampahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nota_id')->nullabel()->constrained('nota_sampahs');
            $table->string('nomor_surat');
            $table->date('tanggal');
            $table->date('tanggalnotasampahkapal');
            $table->string('dibuatoleh');
            $table->text('lampiranpendukung');
            $table->string('pic');
            $table->unsignedBigInteger('penanda_tangan_id');
            $table->tinyInteger('penanda_tangan_status')->nullable();
            $table->timestamp('penanda_tangan_time')->nullable();
            $table->text('penanda_tangan_keterangan')->nullable();
            $table->unsignedBigInteger('pihak_verifikasi_id');
            $table->tinyInteger('pihak_verifikasi_status')->nullable();
            $table->timestamp('pihak_verifikasi_time')->nullable();
            $table->text('pihak_verifikasi_keterangan')->nullable();
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
        Schema::dropIfExists('berita_acara_nota_sampahs');
    }
};

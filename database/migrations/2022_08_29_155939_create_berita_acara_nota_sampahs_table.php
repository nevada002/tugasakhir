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
            $table->increments('id');
            $table->string('nomor_surat');
            $table->date('tanggal');
            $table->date('tanggalnotasampahkapal');
            $table->string('dibuatoleh');
            $table->text('lampiranpendukung');
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

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
        Schema::create('nota_kapals', function (Blueprint $table) {
            $table->id(); 
            $table->string('namakapal');
            $table->date('tanggal');
            $table->text('deskripsi');
            $table->text('lampiranpendukung');
            $table->foreignId('status_id')->constrained('status_berita_acaras');
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
        Schema::dropIfExists('nota_kapals');
    }
};

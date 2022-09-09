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
        Schema::create('nota_sampahs', function (Blueprint $table) {
            $table->id();
            $table->string('namakapal');
            $table->date('tanggal');
            $table->string('nomornota');
            $table->text('deskripsi');
            $table->text('lampiranpendukung');
            $table->tinyInteger('status');
            $table->foreignId('created_by')->constrained('users');
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
        Schema::dropIfExists('nota_sampahs');
    }
};

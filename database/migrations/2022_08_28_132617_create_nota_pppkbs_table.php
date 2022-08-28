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
        Schema::create('nota_ppkbs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namakapal');
            $table->string('negara');
            $table->string('noppkb');
            $table->string('service');
            $table->string('agen');
            $table->text('alasan');
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
        Schema::dropIfExists('nota_ppkbs');
    }
};

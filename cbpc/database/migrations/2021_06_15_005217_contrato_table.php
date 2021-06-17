<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('idJogador');
            $table->unsignedBigInteger('idTime');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->tinyInteger('status');
            $table->timestamps();

            $table->foreign('idJogador')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('idTime')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}

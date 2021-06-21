<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProfilePermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_profile', function (Blueprint $table) {
            $table->unsignedBigInteger('idPermissao');
            $table->unsignedBigInteger('idPerfil');

            $table->foreign('idPermissao')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('idPerfil')->references('id')->on('profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

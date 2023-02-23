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
        Schema::create('alergiasusuarios', function (Blueprint $table) {
            
            $table->bigInteger("idUsuario")->unsigned();
            $table->bigInteger("idAlergia")->unsigned();
            $table->foreign('idUsuario')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('idAlergia')->references('id')->on('alergias')->cascadeOnDelete();
            $table->primary(["idAlergia","idUsuario"]);
            $table->index(["idAlergia","idUsuario"]);
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
        Schema::dropIfExists('alergiasusuarios');
    }
};

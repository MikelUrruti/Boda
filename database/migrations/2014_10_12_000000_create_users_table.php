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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->collation("utf8mb4_spanish_ci")->nullable();
            $table->string('apellido')->collation("utf8mb4_spanish_ci")->nullable();
            $table->string('correo')->unique()->collation("utf8mb4_spanish_ci");
            $table->string('password')->nullable();
            $table->bigInteger('pareja')->unsigned()->nullable()->unique();
            $table->enum("transporte",["Ida","No","Vuelta","Ambos"])->default("No");
            $table->enum("tipo",["Usuario","Admin"])->default("Usuario");
            $table->enum("confirmado",["Si","No"])->default("No");
            $table->enum("externo",["Si","No"])->default("No");
            $table->foreign('pareja')->references('id')->on('users')->nullOnDelete();
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
        Schema::dropIfExists('users');
    }
};

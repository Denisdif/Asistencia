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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_empresa');
            $table->string('cuit');
            $table->string('domicilio')->nullable();
            $table->string('razon_social')->nullable();
            $table->timestamps();
        });

        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_area');
            $table->unsignedBigInteger('empresa_id');

            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->timestamps();
        });

        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_departamento');
            $table->unsignedBigInteger('area_id');

            $table->foreign('area_id')->references('id')->on('areas');
            $table->timestamps();
        });

        Schema::create('puestos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_puesto');
            $table->unsignedBigInteger('departamento_id');
            
            $table->foreign('departamento_id')->references('id')->on('departamentos');
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
        Schema::dropIfExists('puestos');
        Schema::dropIfExists('departamentos');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('empresas');
    }
};

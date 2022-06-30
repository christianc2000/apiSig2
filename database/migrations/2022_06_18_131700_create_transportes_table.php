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
        Schema::create('transportes', function (Blueprint $table) {
            $table->id();
            $table->string('placa');
            $table->string('modelo');
            $table->unsignedInteger('cantidad_asiento');
            $table->unsignedInteger('numero_interno');
            $table->date('fecha_asignacion');
            $table->date('fecha_baja')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('linea_id')->references('id')->on('lineas');
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
        Schema::dropIfExists('transportes');
    }
};

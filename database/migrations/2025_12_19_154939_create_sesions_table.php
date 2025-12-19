<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sesions', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_sesion', 50);
            $table->string('nombre_cliente', 100);
            $table->string('telefono', 20);
            $table->string('ubicacion', 150);
            $table->dateTime('fecha_hora');
            $table->enum('estado', [
                'agendada',
                'realizada',
                'entregada',
                'cancelada'
            ])->default('agendada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesions');
    }
};

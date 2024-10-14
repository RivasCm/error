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
        Schema::create('licencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('padre_id')->constrained('users');
            $table->date('fecha_solicitud');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('motivo');
            $table->enum('estado', ['pendiente', 'aprobada', 'rechazada']);
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
        Schema::dropIfExists('licencias');
    }
};

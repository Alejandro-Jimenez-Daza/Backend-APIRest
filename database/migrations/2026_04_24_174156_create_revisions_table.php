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
        Schema::create('revisiones', function (Blueprint $table) {
            $table->id();
            //llave que conecta con carros
            $table->foreignId('carro_id')
            ->references('id')
            ->on('carros')
            ->onDelete('cascade');

            $table->dateTime('fecha_revision'); //no es datetimes, es dateTime, t mayus y singular.
            $table->string('tipo_mecanica', 20);
            $table->decimal('costo', 11,2);
            $table->string('observaciones', 300);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisiones');
    }
};

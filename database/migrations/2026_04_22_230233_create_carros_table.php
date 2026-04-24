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
        Schema::create('carros', function (Blueprint $table) {
            $table->id();
            $table->string('matricula',6)->unique();
            // $table->string('propietario')->default('AZ-CARS');

            //elimimo propietarios de string y dejo por foranea, esta forma es explicita
            $table->foreignId('propietario_id')
            ->references('id')
            ->on('propietarios')
            ->onDelete('cascade');

            $table->string('marca')->default('NA');
            $table->integer('cilindraje')->unsigned();
            $table->boolean('disponible')->default(false);
            $table->timestamps();
            //llave foranea a propietario (aca es la conexio, despues de crear elc ampo arriba porque si no ps no me va a dar con string):

        }); 


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carros');
    }


};

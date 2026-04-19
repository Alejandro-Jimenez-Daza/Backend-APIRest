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
            $table->string('propietario')->default('AZ-CARS');
            $table->string('marca')->default('NA');
            $table->integer('cilindraje')->unsigned();
            $table->boolean('disponible')->default(false);
            $table->timestamps();
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
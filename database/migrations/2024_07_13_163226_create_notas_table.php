<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id(); // Clave primaria tipo BigInteger
            $table->foreignId('estudiante_id')->constrained()->onDelete('cascade');
            $table->foreignId('materia_id')->constrained()->onDelete('cascade');
            $table->integer('nota');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('notas');
    }
    
};

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
        Schema::create('materias', function (Blueprint $table) {
            $table->id(); // Clave primaria tipo BigInteger
            $table->string('nombre');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('materias');
    }
    

};

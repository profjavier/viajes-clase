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
        Schema::create('viajes', function (Blueprint $table) {
            $table->id();
            $table->string('referencia',12)->unique();
            $table->string('titulo',200);
            $table->string('slug',250)->unique();
            $table->decimal('precio',10,2)->nullable();
            $table->integer('numero_participantes')->nullable();
            $table->timestamp('salida')->nullable();
            $table->timestamp('llegada')->nullable();
            $table->string('foto')->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viajes');
    }
};

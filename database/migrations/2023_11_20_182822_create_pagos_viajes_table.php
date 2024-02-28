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
        Schema::create('pagos_viajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inscripcion_viaje_id')->constrained('inscripcion_viajes')->cascadeOnDelete();
            $table->decimal('pagado', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos_viajes');
    }
};

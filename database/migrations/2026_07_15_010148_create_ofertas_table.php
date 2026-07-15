<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->id('id_oferta');
            $table->string('of_nombre', 100);
            $table->text('descripcion')->nullable();
            $table->decimal('porcentaje', 5, 2)->check('porcentaje >= 0 AND porcentaje <= 100');
            $table->date('fecha_inc');
            $table->date('fecha_fin');
            $table->boolean('activo')->default(true);
            $table->timestamps();
            
            // Indices
            $table->index(['fecha_inc', 'fecha_fin']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ofertas');
    }
};
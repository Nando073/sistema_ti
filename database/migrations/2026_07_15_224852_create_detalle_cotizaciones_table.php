<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_cotizaciones', function (Blueprint $table) {
            $table->id('id_detalle');
            $table->foreignId('id_cotizacion')
                  ->constrained('cotizaciones', 'id_cotizacion')
                  ->onDelete('cascade');
            $table->integer('id_orden_serv')->nullable(); // Solo referencial, SIN FK
            $table->decimal('precio', 10, 2);
            $table->integer('cantidad');
            $table->decimal('descuento', 10, 2)->default(0);
            $table->string('estado', 50)->default('activo');
            $table->timestamps();
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_cotizaciones');
    }
};
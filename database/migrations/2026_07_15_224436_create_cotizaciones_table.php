<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id('id_cotizacion');
            $table->integer('id_orden_serv')->nullable();
            $table->foreignId('id_oferta')
                  ->nullable()
                  ->constrained('ofertas', 'id_oferta')
                  ->onDelete('set null');
            $table->integer('id_cliente')->nullable();
            $table->timestamp('fecha_registro')->useCurrent();
            $table->string('estado', 50)->default('pendiente');
            $table->date('fecha_cad');
            $table->decimal('monto_total', 10, 2);
            $table->decimal('descuento', 10, 2)->default(0);
            $table->timestamps();
            
           
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cotizaciones');
    }
};
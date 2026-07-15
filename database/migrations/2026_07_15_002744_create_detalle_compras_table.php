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
        Schema::create('detalle_compras', function (Blueprint $table) {
           $table->id('id_detalle_compra');
            $table->decimal('precio', 10, 2);
            $table->decimal('sub_total', 10, 2);
            $table->boolean('activo')->default(true);
            $table->integer('cantidad');

            $table->foreignId('id_compra')->constrained('compras', 'id_compra')->onDelete('cascade');
            $table->integer('id_repuesto')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_compras');
    }
};

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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_pago')->useCurrent();
            $table->decimal('monto', 10, 2);
            $table->string('estado')->default('completado');
            $table->foreignId('metodo_pago_id')->constrained('metodos_pago');
            $table->foreignId('venta_id')->constrained('ventas');
            $table->foreignId('tarjeta_id')->nullable()->constrained('tarjetas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};

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
        Schema::create('pago', function (Blueprint $table) {
            $table->integer('id_pago')->autoIncrement()->primary();
            $table->integer('id_sorteo');
            $table->integer('id_cliente');
            $table->string('cedula_cliente');
            $table->string('referencia')->unique();
            $table->double('monto');
            $table->integer('cantidad_de_tickets');
            $table->string('descripcion')->nullable();
            $table->date('fecha_pago');
            $table->string('metodo_de_pago');
            $table->string('nro_telefono');
            $table->string('estado_pago')->default('pendiente');
            $table->string("imagen_comprobante");
        
           $table->foreign('id_cliente')
                ->references('id')
                ->on('cliente')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                
            $table->foreign('id_sorteo')
                ->references('id_sorteo')
                ->on('sorteo')
                ->onDelete('cascade')
                ->onUpdate('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pago');
    }
};

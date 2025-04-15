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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data_hora_pedido');
            $table->foreignId('cliente_id')->unsigned('clientes')->onDelete('cascade');
            $table->decimal('valor_total', 10, 2);
            $table->decimal('valor_desconto', 10, 2)->nullable();
            $table->string('forma_pagamento');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('pedido_produto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id')->unsigned('pedidos')->onDelete('cascade');
            $table->foreignId('produto_id')->unsigned('produtos')->onDelete('cascade');
            $table->integer('quantidade');
            $table->decimal('valor_unitario', 10, 2);
            $table->timestamps();

            $table->unique(['pedido_id', 'produto_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido_produto');
        Schema::dropIfExists('pedidos');
    }
};

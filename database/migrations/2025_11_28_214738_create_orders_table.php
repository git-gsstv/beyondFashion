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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('employee_id')->constrained()->onDelete('restrict');
            $table->string('cliente_nome', 150);
            $table->enum('status', ['Pendente', 'Pago', 'Enviado', 'Cancelado'])->default('Pendente');
            $table->enum('forma_pagamento', ['Crédito', 'Débito', 'Dinheiro', 'PIX']);
            $table->decimal('total', 8, 2)->default(0.00); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

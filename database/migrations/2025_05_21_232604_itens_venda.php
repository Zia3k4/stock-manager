<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
     Schema::create('itens_venda', function (Blueprint $table) {
     $table->id();
         $table->unsignedBigInteger('produto_id');
         $table->integer('quantidade');
         $table->decimal('preco_unitario', 10, 2);
        // Preço na hora da venda
         $table->enum('status', ['vendido', 'cancelado'])->default('vendido');
         $table->foreign('venda_id')->references('id')->on('vendas');
         $table->foreign('produto_id')->references('id')->on('produtos');

         $table->timestamps();
     });
    }
     public function down(): void
    {
        Schema::dropIfExists('vendas');

    }
};

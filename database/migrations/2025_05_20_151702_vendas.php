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
      Schema::create('vendas', function (Blueprint $table) {
    $table->id();
    $table->timestamp('data_venda')->useCurrent();
    $table->string('nome_cliente')->nullable();
    $table->string('cpf_cliente', 14)->nullable();
    $table->decimal('valor_total', 10, 2)->default(0);
    $table->timestamps();});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');

    }
};

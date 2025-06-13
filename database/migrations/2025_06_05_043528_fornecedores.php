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
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cnpj', 18);
            $table->unique('cnpj', 'fornecedores_cnpj_unique');
            $table->string('cep', 9)->nullable();
            $table->string('contato')->nullable();
            $table->string('endereco')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('fornecedores');
    }
};

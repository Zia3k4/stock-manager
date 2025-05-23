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
       Schema::create('registro_frequencia', function (Blueprint $table) {
        $table->id();
        $table->foreignId('funcionario_id')->constrained('funcionarios')->onDelete('cascade');
        $table->date('data');
        $table->time('hora_chegada')->nullable();
        $table->time('hora_saida')->nullable();
        $table->decimal('horas_trabalhadas', 5, 2)->nullable(); // calculado e salvo manualmente
        $table->decimal('atraso', 5, 2)->nullable(); // em horas
        $table->decimal('saida_antecipada', 5, 2)->nullable(); // em horas
        $table->text('observacoes')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_frequencia');
    }
};
//revisar q fiz quando tava com sono

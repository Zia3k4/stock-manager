<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
Schema::create('estoque', function (Blueprint $table) {
    $table->id();
    $table->foreignId('produto_id')->constrained('produtos')->onDelete('cascade');
    $table->enum('tipo_movimentacao', ['entrada', 'saida']);
    $table->integer('quantidade');
    $table->timestamp('data_movimentacao')->useCurrent();
    $table->text('observacao')->nullable();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estoque');
    }
};


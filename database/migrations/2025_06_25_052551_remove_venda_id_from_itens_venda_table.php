<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('itens_venda', function (Blueprint $table) {
            $table->dropForeign(['venda_id']); // Remove a FK
            $table->dropColumn('venda_id');    // Remove a coluna
        });
    }

    public function down()
    {
        Schema::table('itens_venda', function (Blueprint $table) {
            $table->unsignedBigInteger('venda_id');
            $table->foreign('venda_id')->references('id')->on('vendas');
        });
    }
};

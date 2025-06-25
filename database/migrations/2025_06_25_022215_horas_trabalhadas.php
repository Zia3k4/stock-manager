<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('horas_trabalhadas', function (Blueprint $table) {
           $table->id();
            $table->unsignedBigInteger('funcionario_id');
            $table->date('semana_inicio');
            $table->date('semana_fim');
            $table->decimal('total_horas', 6, 2);
            $table->timestamps();

            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
        });
    }

    public function down()
    {
        Schema::dropIfExists('horas_trabalhadas');
    }
};

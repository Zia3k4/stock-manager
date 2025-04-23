<?php
//arquivo feito pelo gpt
namespace App\Services;

use App\Models\Funcionario;
use App\Models\Frequencia;

class RHService
{
    //colocar no autoload depois o helper la
    /**
     * Calcula o salário total de um funcionário.
     */
    public function calcularSalario(int $funcionarioId): float
    {
        $funcionario = Funcionario::findOrFail($funcionarioId);
        $frequencia = Frequencia::where('funcionario_id', $funcionarioId)->get();

        $salarioBase = $funcionario->salario;
        $horasExtras = $frequencia->sum('horas_extras');
        $valorHora = $salarioBase / 160; // Exemplo: salário dividido por 160h/mês

        $total = $salarioBase + ($horasExtras * $valorHora);

        return round($total, 2);
    }
}
//feito pelo gpt ate aqui depois corrigir
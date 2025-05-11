<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\RHService;
//revisar
class FuncionarioController extends Controller
{
    public function mostrarSalario($id, RHService $rhService)
{
    $salario = $rhService->calcularSalario($id);
    return view('funcionarios.salario', compact('salario'));
}
//revisar
}


<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

use App\Services\RHService;
use App\Models\Funcionario;
//revisar
class FuncionarioController extends Controller
{
    public function mostrarSalario($id, RHService $rhService)
    {
        $salario = $rhService->calcularSalario($id);
        return view('funcionarios.salario', compact('salario'));
    }
    public function index()
    {
        $funcionarios = Funcionario::orderBy('created_at', 'DESC')->get();
        return view('funcionarios.index', compact('funcionarios'));
    }
    //public function index()
    /**
     *  @return \Illuminate\Http\Response
     *
     */
    //revisar
 //revisar
}


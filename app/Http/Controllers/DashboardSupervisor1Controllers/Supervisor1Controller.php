<?php

namespace App\Http\Controllers\DashboardSupervisor1Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Supervisor1Controller extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'role:Supervisor1']);
    }

    public function index()
    {
        $user = Auth::user();

        // Exemplo: supervisor vê apenas dados da sua equipe/setor
        return view('supervisor1.dashboard', [
            'vendas' => $user->Vendas(),
            'estoque' => $user->Estoque(),
            'produtos' => $user->Produtos(),
        ]);
    }
}

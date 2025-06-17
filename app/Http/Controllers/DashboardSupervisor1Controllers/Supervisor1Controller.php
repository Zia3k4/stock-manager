<?php

namespace App\Http\Controllers\DashboardSupervisor1Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class Supervisor1Controller extends Controller
{//nao possui service paterns
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'role:Supervisor1']);
    }

    public function index()
    {
        $user = Auth::user();

        // Exemplo: supervisor vê apenas dados da sua equipe/setor
        return Inertia::render('Dashboard/Supervisor', [
            'vendas' => $user->Vendas(), // Associe de acordo com sua relação
            'estoque' => $user->Estoque(), // Associe de acordo com sua relação
            'produtos' => $user->Produtos(), // Associe de acordo com sua relação
        ]);
    }
}

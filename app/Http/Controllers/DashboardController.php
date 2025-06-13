<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:Gerente']);
    }

    public function index()
    {
        // Exemplo: gerente vê todos os dados
        return Inertia::render('Dashboard/Gerente',[
            'title' => 'Dashboard Gerente',
            'description' => 'Bem-vindo ao painel do gerente. Aqui você pode gerenciar todos os aspectos do sistema.',
            // Adicione mais dados conforme necessário
        ])->with([
            'success' => session('success'),
            'error' => session('error'),
        ]);
    }
}

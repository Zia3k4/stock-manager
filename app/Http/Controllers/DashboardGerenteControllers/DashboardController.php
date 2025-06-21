<?php

namespace App\Http\Controllers\DashboardGerenteControllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'role:Gerente']);
    }

    public function index()
    {
        return view('dashboard.gerente', [
            'title' => 'Dashboard Gerente',
            'description' => 'Bem-vindo ao painel do gerente. Aqui você pode gerenciar todos os aspectos do sistema.',
            'success' => session('success'),
            'error' => session('error'),
        ]);
    }
}

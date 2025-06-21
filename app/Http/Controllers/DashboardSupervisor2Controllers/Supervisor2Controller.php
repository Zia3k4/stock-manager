<?php

namespace App\Http\Controllers\DashboardSupervisor2Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Supervisor2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'role:Supervisor2']);
    }

    public function index()
    {
        $user = Auth::user();

        // Funcionário vê apenas seus próprios dados
        return view('supervisor2.dashboard', [
            'meus_dados' => $user
        ]);
    }
}

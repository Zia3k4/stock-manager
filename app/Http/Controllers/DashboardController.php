<?php

use Inertia\Inertia;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Controller responsável pelo gerenciamento do dashboard.
     * Inclui funcionalidades de exibição da página inicial do dashboard.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Dashboard');
        
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\HorasTrabalhadasRequest;

use App\Services\HorasTrabalhadasService;
//use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
// Controller refatorado para usar o Inertia.js e o Service Pattern
class HorasTrabalhadasController extends Controller
//registrar a rota de horas trabalhadas no arquivo routes/web.php
{
     protected HorasTrabalhadasService $horasTrabalhadasService;
     public function __construct(HorasTrabalhadasService $horasTrabalhadasService)
        {
            $this->horasTrabalhadasService = $horasTrabalhadasService;
        }
        public function index()
        {// Renderiza a página de horas trabalhadas com os dados necessários e criar componentes referentes as rotas
            return Inertia::render('HorasTrabalhadas/Index', [
                'horasTrabalhadas' => $this->horasTrabalhadasService->getAll(),
            ]);

        }
        public function create(){
         return Inertia::render('HorasTrabalhadas/Create');
        }
        public function store(HorasTrabalhadasRequest $request): RedirectResponse
        {
            $this->horasTrabalhadasService->create($request->validated());
            return redirect()->route('horasTrabalhadas.index')->with('success', 'Horas trabalhadas criadas com sucesso!');
        }
        public function show(int $id)
        {
            return Inertia::render('HorasTrabalhadas/Show', [
                'horasTrabalhada' => $this->horasTrabalhadasService->getById($id),
            ]);
        }
        public function edit(int $id)
        {
            return Inertia::render('HorasTrabalhadas/Edit', [
                'horasTrabalhada' => $this->horasTrabalhadasService->getById($id),
            ]);
        }
        public function update(HorasTrabalhadasRequest $request, $id): RedirectResponse
        {
            $request->validate([
                'funcionario_id' => 'required|exists:funcionarios,id',
                'data' => 'required|date',
                'horas_trabalhadas' => 'required|numeric|min:0',
            ]);

            $this->horasTrabalhadasService->update($id, $request->validated());
            return redirect()->route('horasTrabalhadas.index')->with('success', 'Horas trabalhadas atualizadas com sucesso!');
        }
        public function destroy($id): RedirectResponse
        {
            $this->horasTrabalhadasService->delete($id);
            return redirect()->route('horasTrabalhadas.index')->with('success', 'Horas trabalhadas excluídas com sucesso!');
        }
}

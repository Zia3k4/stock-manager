<?php

namespace App\Http\Controllers\DashboardGerenteControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\UsuarioService;
use Illuminate\Http\RedirectResponse;

class UsuarioController extends Controller
{
    public function __construct(private UsuarioService $usuarioService){
        $this->middleware(['auth:sanctum', 'role:Gerente']);
    }

    public function index()
    {
        return view('gerente.usuarios.index', [
            'users' => $this->usuarioService->getAll(),
        ]);
    }

    public function create()
    {
        return view('gerente.usuarios.create');
    }

    public function store(UserRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'nullable|string|max:255',
        ]);
        $this->usuarioService->create($request->validated());
        return redirect()->route('gerente.usuarios.create')->with('success', 'Usuário criado com sucesso!');
    }

    public function show($id)
    {
        return view('gerente.usuarios.show', [
            'users' => $this->usuarioService->getById($id),
        ]);
    }

    public function edit($id)
    {
        return view('gerente.usuarios.edit', [
            'users' => $this->usuarioService->getById($id),
        ]);
    }

    public function update(UserRequest $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|string|min:6',
            'role' => 'nullable|string|max:255',
        ]);
        $this->usuarioService->update($id, $request->validated());
        return redirect()->route('gerente.usuarios.edit', $id)->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id): RedirectResponse
    {
        $this->usuarioService->delete($id);
        return redirect()->route('gerente.usuarios.index')->with('success', 'Usuário excluído com sucesso!');
    }
}

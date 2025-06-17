<?php

namespace App\Http\Controllers\DashboardGerenteControllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\UsuarioService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class UsuarioController extends Controller
{
    public function __construct(private UsuarioService $usuarioService){
        $this->middleware(['auth:sanctum', 'role:Gerente']);
    }
    public function index()
    {

       return Inertia::render('GerentePage/user-index', [
            'users' => $this->usuarioService->getAll(),
        ]);
    }
    public function create()
    {
        return Inertia::render('GerentePage/user-create');
    }
    public function store(UserRequest $request)
    {
        // Validação dos dados do usuário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'nullable|string|max:255',
        ]);
        $this->usuarioService->create($request->validated());
        return redirect()->route('gerente.gerente.usuarios.create')->with('success', 'Usuário criado com sucesso!');
    }
    public function show($id)
    {
        // Busca o usuário pelo ID e retorna uma view para exibir os detalhes
        return Inertia::render('GerentePage/user-show', [
            'users' => $this->usuarioService->getById($id),
        ]);
    }

    public function edit($id)
    {
        // Busca o usuário pelo ID e retorna uma view para editar
    return Inertia::render('', [
            'users' => $this->usuarioService->getById($id),
        ]);
    }
    public function update(UserRequest $request, $id)
    {
        // Validação dos dados do usuário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'nullable|string|max:255',
        ]);
       $this ->usuarioService->update($id, $request->validated());
        // Busca o usuário pelo ID e atualiza os dados
        return redirect()->route('gerente.usuarios.update')->with('success', 'Usuário atualizado com sucesso!');
    }
    public function destroy($id):RedirectResponse
    {
       $this->usuarioService->delete($id);
        // Busca o usuário pelo ID e exclui
        return redirect()->route('gerente.gerente.usuarios.create')->with('success', 'Usuário excluído com sucesso!');
    }


}

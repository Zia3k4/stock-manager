<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserRequest;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
use App\Services\UsuarioService;
class UsuarioController extends Controller
{    protected UsuarioService $usuarioService;
    public function __construct(UsuarioService $usuarioService){
        $this->usuarioService = $usuarioService;
    }
    public function index()
    {

       return Inertia::render('Usuarios/Index', [
            'users' => $this->usuarioService->getAll(),
        ]);
    }
    public function create()
    {
        return Inertia::render('Usuarios/Create');
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
        return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso!');
    }
    public function show($id)
    {
        // Busca o usuário pelo ID e retorna uma view para exibir os detalhes
        return Inertia::render('Usuarios/Show', [
            'users' => $this->usuarioService->getById($id),
        ]);
    }

    public function edit($id)
    {
        // Busca o usuário pelo ID e retorna uma view para editar
    return Inertia::render('Usuarios/Edit', [
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
        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }
    public function destroy($id):RedirectResponse
    {
       $this->usuarioService->delete($id);
        // Busca o usuário pelo ID e exclui
        return redirect()->route('usuarios.index')->with('success', 'Usuário excluído com sucesso!');
    }


}

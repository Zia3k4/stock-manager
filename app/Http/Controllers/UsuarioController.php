<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Inertia\Inertia;
class UsuarioController extends Controller
{
    public function index()
    {

       return Inertia::render('Usuarios/Index', [
            'users' => User::all(),
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

        // Criação do usuário
        User::create([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        'role' => 'nullable|string|max:255',
        ]);

        // Redireciona para a lista de usuários com uma mensagem de sucesso
        return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso!');
    }
    public function show($id)
    {
        // Busca o usuário pelo ID e retorna uma view para exibir os detalhes
        return Inertia::render('Usuarios/Show', [
            'users' => User::findOrFail($id),
        ]);
    }

    public function edit($id)
    {
        // Busca o usuário pelo ID e retorna uma view para editar
    return Inertia::render('Usuarios/Edit', [
            'users' => User::findOrFail($id),
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

        // Atualiza o usuário
        $users = User::findOrFail($id);
        $users->name = $request->name;
        $users->email = $request->email;
        if ($request->filled('password')) {
            $users->password = bcrypt($request->password);
        }
        $users->save();

        // Redireciona para a lista de usuários com uma mensagem de sucesso
        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }
    public function destroy($id)
    {
        // Busca o usuário pelo ID e deleta
        $users = User::findOrFail($id);
        $users->delete();

        // Redireciona para a lista de usuários com uma mensagem de sucesso
        return redirect()->route('usuarios.index')->with('success', 'Usuário deletado com sucesso!');
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
class UsuarioController extends Controller
{
    public function index()
    {

       return Inertia::render('Usuarios/Index', [
            'usuarios' => User::all(),
        ]);
    }
    public function create()
    {
        return Inertia::render('Usuarios/Create');
    }
    public function store(Request $request)
    {
        // Validação dos dados do usuário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'requir ed|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Criação do usuário
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Redireciona para a lista de usuários com uma mensagem de sucesso
        return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso!');
    }
    public function show($id)
    {
        // Busca o usuário pelo ID e retorna uma view para exibir os detalhes
        return Inertia::render('Usuarios/Show', [
            'usuario' => User::findOrFail($id),
        ]);
    }

    public function edit($id)
    {
        // Busca o usuário pelo ID e retorna uma view para editar
    return Inertia::render('Usuarios/Edit', [
            'usuario' => User::findOrFail($id),
        ]);
    }
    public function update(Request $request, $id)
    {
        // Validação dos dados do usuário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Atualiza o usuário
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        // Redireciona para a lista de usuários com uma mensagem de sucesso
        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }
    public function destroy($id)
    {
        // Busca o usuário pelo ID e deleta
        $user = User::findOrFail($id);
        $user->delete();

        // Redireciona para a lista de usuários com uma mensagem de sucesso
        return redirect()->route('usuarios.index')->with('success', 'Usuário deletado com sucesso!');
    }


}

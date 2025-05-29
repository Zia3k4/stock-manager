<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


/* * Controller de Usuários
 *
 * Este controller gerencia as operações relacionadas aos usuários, incluindo
 * criação, edição, atualização e exclusão.
 *
 */

class UsuarioController extends Controller
{
    public function index()
    {
        // Aqui você pode buscar os usuários do banco de dados e retornar uma view
        // Exemplo:
        $users = User::all();
        return view('usuarios.index', compact('usuarios'));
    }
    public function create()
    {
        // Retorna uma view para criar um novo usuário
        // Exemplo:
        // return view('usuarios.create');
    }
    public function store(Request $request)
    {
        // Validação dos dados do usuário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
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
    public function edit($id)
    {
        // Busca o usuário pelo ID e retorna uma view para editar
        $user = User::findOrFail($id);
        return view('usuarios.edit', compact('user'));
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
    public function show($id)
    {
        // Busca o usuário pelo ID e retorna uma view para mostrar os detalhes
        $user = User::findOrFail($id);
        return view('usuarios.show', compact('user'));
    }
    public function buscarusuario(Request $request)
    {
        $codigo = $request->input('codigo');
        $usuario = User::find($codigo);
        return response()->json($usuario);
    }
    public function buscarusuario2(Request $request)
    {
        $codigo = $request->input('codigo');
        $usuario = User::find($codigo);
        return response()->json($usuario);
    }
    public function buscarusuario3(Request $request)
    {
        $codigo = $request->input('codigo');
        $usuario = User::find($codigo);
        return response()->json($usuario);
    }
    public function buscarusuario4(Request $request)
    {
        $codigo = $request->input('codigo');
        $usuario = User::find($codigo);
        return response()->json($usuario);
    }
    public function buscarusuario5(Request $request)
    {
        $codigo = $request->input('codigo');
        $usuario = User::find($codigo);
        return response()->json($usuario);
    }
    public function buscarusuario6(Request $request)
    {
        $codigo = $request->input('codigo');
        $usuario = User::find($codigo);
        return response()->json($usuario);
    }
    public function buscarusuario7(Request $request)
    {
        $codigo = $request->input('codigo');
        $usuario = User::find($codigo);
        return response()->json($usuario);
    }
    public function buscarusuario8(Request $request)
    {
        $codigo = $request->input('codigo');
        $usuario = User::find($codigo);
        return response()->json($usuario);
    }
    public function buscarusuario9(Request $request)
    {
        $codigo = $request->input('codigo');
        $usuario = User::find($codigo);
        return response()->json($usuario);
    }
    public function buscarusuario10(Request $request)
    {
        $codigo = $request->input('codigo');
        $usuario = User::find($codigo);
        return response()->json($usuario);
    }


}

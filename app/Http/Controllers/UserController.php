<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Exibir uma lista de todos os usuários.
     * Apenas usuários com o papel de 'master' podem acessar essa lista.
     */
    public function index(){
        if (Auth::user()->is_master) {
            $users = User::all();
            return view('auth.users.index', compact('users'));
        }
        return redirect()->back()->with('error', 'Acesso negado.');
    }

    /**
     * Exibir o formulário para criar um novo usuário.
     * Apenas usuários com o papel de 'master' podem acessar o formulário.
     */
    public function create(){
        if (Auth::user()->is_master) {
            return view('auth.users.create');
        }
        return redirect()->back()->with('error', 'Acesso negado.');
    }

    /**
     * Armazenar um novo usuário no banco de dados.
     * Apenas usuários com o papel de 'master' podem criar novos usuários.
     */
    public function store(Request $request){
        if (Auth::user()->is_master) {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'is_master' => 'boolean',
            ]);

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'is_master' => $validated['is_master'] ?? false,
            ]);

            return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!');
        }
        return redirect()->back()->with('error', 'Acesso negado.');
    }

    /**
     * Exibir o formulário para editar um usuário existente.
     * Apenas usuários com o papel de 'master' podem acessar o formulário de edição.
     */
    public function edit($id){
        if (Auth::user()->is_master) {
            $user = User::findOrFail($id);
            return view('auth.users.edit', compact('user'));
        }
        return redirect()->back()->with('error', 'Acesso negado.');
    }

    /**
     * Atualizar um usuário existente no banco de dados.
     * Apenas usuários com o papel de 'master' podem atualizar usuários.
     */
    public function update(Request $request, $id){
        if (Auth::user()->is_master) {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'password' => 'nullable|string|min:8|confirmed',
                'is_master' => 'boolean',
            ]);

            $user = User::findOrFail($id);
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            if ($validated['password']) {
                $user->password = bcrypt($validated['password']);
            }
            $user->is_master = $validated['is_master'] ?? false;
            $user->save();

            return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
        }
        return redirect()->back()->with('error', 'Acesso negado.');
    }

    /**
     * Excluir um usuário do banco de dados.
     * Apenas usuários com o papel de 'master' podem excluir usuários.
     */
    public function destroy($id)
    {
        if (Auth::user()->is_master) {
            // Encontrar o usuário a ser excluído
            $user = User::find($id);

            if ($user) {
                // Transferir produtos do usuário para o usuário master com ID 1
                $user->products()->update(['user_id' => 1]); // Transferir para o master

                // Agora, excluir o usuário
                $user->delete();

                return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso!');
            }

            return redirect()->back()->with('error', 'Usuário não encontrado.');
        }

        return redirect()->back()->with('error', 'Acesso negado.');
    }
}

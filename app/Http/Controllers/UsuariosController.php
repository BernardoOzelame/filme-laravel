<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller {
    public function index() {
        $dados = Usuario::orderBy('name', 'asc')->get();
        return view('usuarios/index', [
            'usuarios' => $dados
        ]);
    }

    public function cadastrar() {
        return view('usuarios/cadastrar');
    }

    public function gravar(Request $form) {
        $dados = $form->validate([
            'name' => 'required',
            'email' => 'required|email|unique:usuarios',
            'username' => 'required',
            'password' => 'required',
            'admin' => 'required|in:0,1',
        ]);

        $dados['password'] = Hash::make($dados['password']);

        Usuario::create($dados);

        return redirect()->route('usuarios');
    }

    public function editar(Usuario $user) {
        return view('usuarios/editar', ['user' => $user]);
    }

    public function editarGravar(Request $form, Usuario $user) {
        $dados = $form->validate([
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required',
            'admin' => 'required|in:0,1',
        ]);

        $user->fill($dados);
        $user->save();
        return redirect()->route('usuarios');
    }

    public function apagar(Usuario $user) {
        return view('usuarios/apagar', [
            'usuario' => $user,
        ]);
    }

    public function deletar(Usuario $user) {
        $user->delete();
        return redirect()->route('usuarios');
    }

    public function login(Request $form) {
        if($form->isMethod('POST')) {
            // Pega os dados do formulário
            $credenciais = $form->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            // Tenta fazer o login
            if(Auth::attempt($credenciais)){
                return redirect()->intended(route('index'));
            } else {
                return redirect()->route('login')->with('erro', 'Usuário ou senha inválidos');
            }
        }

        return view('usuarios/login');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('index');
    }
}

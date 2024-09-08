<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;

class FilmesController extends Controller {
    public function index() {
        $dados = Filme::all();
        return view('filmes/index', [ 
            'filmes' => $dados,
        ]); 
    }

    public function cadastrar() {
        return view('filmes/cadastrar');
    }

    public function gravar(Request $form) {
        dd($form);
        $dados = $form->validate([
            'nome' => 'required',
            'sinopse' => 'required',
            'ano' => 'required|integer',
            'categoria' => 'required',
            'linkTrailer' => 'required',
        ]);
        Filme::create($dados);
        
        return redirect()->route('filmes');
    }

    public function editar(Filme $func) {
        return view('filmes/editar', ['func' => $func]);
    }

    public function editarGravar(Request $form, Filme $func){
        $dados = $form->validate([
            'nome' => 'required',
            'sinopse' => 'required',
            'ano' => 'required|integer',
            'categoria' => 'required',
            'linkTrailer' => 'required',
        ]);

        $func->fill($dados);
        $func->save();
        return redirect()->route('filmes');
    }

    public function apagar (Filme $func){
        return view('filmes/apagar', [
            'filmes' => $func,
        ]);
    }

    public function deletar (Filme $func){
        $func->delete();
        return redirect()->route('filmes');
    }
}

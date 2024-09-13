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

    public function galeria(){
        $dados = Filme::all();
        return view('filmes/inicial', [ 
            'filmes' => $dados,
        ]); 
    }

    public function cadastrar() {
        return view('filmes/cadastrar');
    }

    public function gravar(Request $form) {
        $dados = $form->validate([
            'nome' => 'required',
            'sinopse' => 'required',
            'ano' => 'required|integer',
            'categoria' => 'required',
            'linkTrailer' => 'required',
            'imagem' => 'required'
        ]);
        $img = $form->file('imagem')->store('filmes', 'imagens');
        $dados['imagem'] = $img;
        Filme::create($dados);
        return redirect()->route('filmes');
    }

    public function editar(Filme $film) {
        return view('filmes/editar', ['film' => $film]);
    }

    public function editarGravar(Request $form, Filme $film){
        $dados = $form->validate([
            'nome' => 'required',
            'sinopse' => 'required',
            'ano' => 'required|integer',
            'categoria' => 'required',
            'linkTrailer' => 'required',
            'imagem' => 'nullable|image'
        ]);

        if ($form->hasFile('imagem')) {
            $img = $form->file('imagem')->store('filmes', 'imagens');
            $dados['imagem'] = $img;
        } else {
            $dados['imagem'] = $film->imagem;
        }

        $film->fill($dados);
        $film->save();
        return redirect()->route('filmes');
    }

    public function apagar (Filme $film){
        return view('filmes/apagar', [
            'filmes' => $film,
        ]);
    }

    public function deletar (Filme $film){
        $film->delete();
        return redirect()->route('filmes');
    }
}

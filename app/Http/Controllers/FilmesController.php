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

    public function galeria(Request $request) {
        $categoria = $request->input('categoria');
        if ($categoria) {
            $dados = Filme::where('categoria', $categoria)->get();
        } else {
            $dados = Filme::all();
        }
        $categorias = Filme::distinct()->pluck('categoria');
        return view('/inicial', [ 
            'filmes' => $dados,
            'categorias' => $categorias,
            'categoriaSelecionada' => $categoria,
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
            'linkTrailer' => [
                'required',
                'url',
                'regex:/^https:\/\/(www\.)?youtube\.com\/.*[?&]v=([^&]+)/'
            ],
            'imagem' => 'required|image'
        ], [
            'linkTrailer.regex' => 'O link do trailer deve ser uma URL válida do YouTube com o parâmetro "v".',
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
            'linkTrailer' => [
                'required',
                'url',
                'regex:/^https:\/\/(www\.)?youtube\.com\/.*[?&]v=([^&]+)/'
            ],
            'imagem' => 'nullable|required|image'
        ], [
            'linkTrailer.regex' => 'O link do trailer deve ser uma URL válida do YouTube com o parâmetro "v".',
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

@extends('base')

@section('titulo', 'Filmes')

@section ('conteudo')
    <a href="{{ route('filmes') }}" class="btn btn-danger btn-cancelar">Cancelar</a>

    @if($errors->any())
        <div class="alert alert-danger m-5" style="margin-top: 70px !important">
            <h4>Ocorreu o(s) seguinte(s) erro(s):</h4>
            <ul>
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container" style="margin-top: 70px">
        <form method="post" enctype="multipart/form-data" action="{{ route('filmes/editar', $film->id) }}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input placeholder="Nome" value="{{ old('nome', $film->nome ?? '') }}" name="nome" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="sinopse" class="form-label">Sinopse</label>
                <input placeholder="Sinopse" value="{{ old('sinopse', $film->sinopse ?? '') }}" name="sinopse" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="ano" class="form-label">Ano</label>
                <input placeholder="Ano" value="{{ old('ano', $film->ano ?? '') }}" name="ano" type="number" class="form-control">
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <input placeholder="Categoria" value="{{ old('categoria', $film->categoria ?? '') }}" name="categoria" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="linkTrailer" class="form-label">Link do trailer</label>
                <input placeholder="Link do trailer" value="{{ old('linkTrailer', $film->linkTrailer ?? '') }}" name="linkTrailer" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem</label>
                @if(!empty($film->imagem))
                    <!-- Mostra a imagem atual -->
                    <div class="mb-3">
                        <img src="{{ asset('img/' . $film->imagem) }}" alt="Imagem do filme" class="img-fluid" style="max-width: 300px;">
                    </div>
                @endif

                <!-- Sempre exibe o campo de upload para permitir alteração -->
                <input class="form-control" id="imagem" name="imagem" type="file" placeholder="Imagem" aria-label="Imagem">
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>
        </form>        
    </div>

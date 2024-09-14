@extends('base')
@extends('../usuarios/logout')

@section('titulo', 'Galeria')

@section ('conteudo')
@if (Auth::user())
    <div class="menu">
        <button class="hamburger" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </button>
        <div class="menu-links">
            <a href="{{ route('filmes') }}">Filmes</a>
            <a href="{{ route('usuarios') }}">Usuários</a>
            <a href="#" id="logout-link">Logout</a>
        </div>
    </div>
@else
    <a href="{{ route('login') }}" class="btn btn-success btn-cadastrar">Login</a>
@endif

<div class="container mt-3">
    <h1 class="text-center mb-3">GALERIA DE FILMES</h1>
    <form action="{{ route('inicial') }}" method="GET" class="mb-4">
        <div class="input-group">
            <select name="categoria" class="form-select" aria-label="Filtrar por Categoria">
                <option value="">Todas as Categorias</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria }}" {{ request('categoria') == $categoria ? 'selected' : '' }}>{{ $categoria }}</option>
                @endforeach
            </select>
            <button class="btn btn-primary" type="submit">Filtrar</button>
        </div>
    </form>
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            @foreach($filmes as $index => $filme)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach($filmes as $index => $filme)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" data-name="{{ $filme->nome }}" data-sinopse="{{ $filme->sinopse }}" data-trailer="{{ $filme->linkTrailer }}" data-categoria="{{ $filme->categoria }}" data-ano="{{ $filme->ano }}">
                    <img title="Ver mais informações" style="cursor: pointer !important" src="{{ asset('img/' . $filme->imagem) }}" class="d-block w-100" alt="{{ $filme->nome }}">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div id="carousel-caption" class="mt-3 d-flex align-items-center justify-content-between">
        <div class="modal fade" id="movieModal" tabindex="-1" aria-labelledby="movieModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="movieModalLabel">Título do Filme</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="modal-sinopse"></p>
                        <p id="modal-categoria"></p>
                        <p id="modal-ano"></p>
                        <a href="" id="modal-trailer" target="_blank" class="btn btn-primary">Ver trailer</a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <p class="fs-3" id="carousel-name"></p>
        </div>
    </div>
</div>

@endsection
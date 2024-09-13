@extends('base')

@section('titulo', 'Filmes')

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
        </div>
    </div>
@endif
<div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
    <p >Aqui terá o Carrossel de filmes</p>

    @if (!Auth::user())
        <a href="{{ route('login') }}">Acesso Administradores</a>
    @endif
</div>

<div class="bd-example">
    @foreach($filmes as $filme)
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="..." class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ $filme['nome'] }}</h5>
                    <p>{{ $filme['sinopse'] }}</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
  @endforeach
</div>
@extends('base')

@section('titulo', 'aAAa')

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
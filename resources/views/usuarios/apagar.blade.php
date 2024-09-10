@extends('base')

@section('titulo', 'Apagar | Usuários')

@section ('conteudo')

<p>Tem certeza que quer apagar?</p>

<p><em><b>ID:</b> {{ $usuario['id'] }} - <b>Nome:</b> {{ $usuario['name'] }}</em></p>

<form method="post" action="{{ route('usuarios/apagar', $usuario['id']) }}">
    @method('delete')
    @csrf
    <input type="submit" value="Pode apagar sem medo" style="background-color: red; color: white; cursor: pointer;">
</form>

<a href="{{ route('usuarios') }}">Cancelar</a>

@endsection
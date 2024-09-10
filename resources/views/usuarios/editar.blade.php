@extends('base')

@section('titulo', 'Editar | Usuários')

@section ('conteudo')

<p>Preencha o formulário</p>

@if($errors->any())
    <div>
        <h4>Ocorreu o(s) seguinte(s) erro(s):</h4>
        <ul>
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ route('usuarios/editar', $user->id) }}">
    @csrf
    @method('put')

    <input type="text" name="name" placeholder="Nome" value="{{ old('name', $user->name ?? '') }}">
    <br>
    <input type="email" name="email" placeholder="E-mail" value="{{ old('email', $user->email ?? '') }}">
    <br>
    <input type="text" name="username" placeholder="Username" value="{{ old('username', $user->username ?? '') }}">
    <br>
    <input type="password" name="password" placeholder="Senha" value="{{ old('password', $user->password ?? '') }}">
    <br>
    <label for="admin">Admin?</label>
    <select name="admin">
        <option value="null">Selecione</option>
        <option value="0" @if($user->admin == 0) selected @endif>Não</option>
        <option value="1" @if($user->admin == 1) selected @endif>Sim</option>
    </select>
    <br>
    <input type="submit" value="Editar">
</form>

@endsection
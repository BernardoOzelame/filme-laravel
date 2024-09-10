@extends('base')

@section('titulo', 'Cadastrar | Usuários')

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

<form method="post" action="{{ route('usuarios/gravar') }}">
    @csrf
    <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}">
    <br>
    <input type="text" name="email" placeholder="E-mail" value="{{ old('email') }}">
    <br>
    <input type="text" name="username" placeholder="Username" value="{{ old('username') }}">
    <br>
    <input type="password" name="password" placeholder="Senha" value="{{ old('password') }}">
    <br>
    <label for="admin">Admin?</label>
    <select name="admin" value="{{ old('admin') }}">
        <option value="null" selected>Selecione</option>
        <option value="0">Não</option>
        <option value="1">Sim</option>
    </select>
    <br>
    <input type="submit" value="Gravar">
</form>

@endsection
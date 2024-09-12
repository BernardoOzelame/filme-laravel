@extends('base')

@section('titulo', 'Usuários')

@section('conteudo')
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
        <form method="post" action="{{ route('usuarios/gravar') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" name="email" placeholder="E-mail" value="{{ old('email') }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" name="password" placeholder="Senha" value="{{ old('password') }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="admin" class="form-label">Admin?</label>
                <select name="admin" class="form-select">
                    <option value="null" selected>Selecione</option>
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>
        </form>
    </div>
@endsection
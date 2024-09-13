@extends('base')

@section('titulo', 'Login')

@section('conteudo')

@if($errors->any())
        <div class="alert alert-danger m-5 fixed-top">
            <h4>Ocorreu o(s) seguinte(s) erro(s):</h4>
            <ul>
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif


<div class="container d-flex justify-content-center align-items-center flex-column" style="height: 100vh;">
    <h1 class="text-center">LOGIN</h1>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div  style="margin-top: 10px">
            <div class="mb-3">
                <label for="username">Usuário</label>
                <input id="username" name="username" type="text" placeholder="Usuário" aria-label="Usuário" class="form-control w-100">
            </div>
            <div class="mb-4">
                <label for="password">Senha</label>
                <input id="password" name="password" type="password" placeholder="Senha" aria-label="Senha" class="form-control w-100">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </div>
    </form>
</div>

@endsection

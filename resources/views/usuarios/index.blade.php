@extends('base')

@section('titulo', 'Usuários')

@section ('conteudo')
    <p>
        <a href="{{ route('usuarios/cadastrar') }}">Cadastrar usuário</a>
    </p>
    <p>Veja a lista de usuários</p>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Usuário</th>           
            <th>Admin?</th>            
            <th colspan=2>Ações</th>
        </tr>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario['id'] }}</td>
                <td>{{ $usuario['name'] }}</td>
                <td>{{ $usuario['email'] }}</td>
                <td>{{ $usuario['username'] }}</td>
                <td> @if($usuario['admin'] == 0) Não @else Sim @endif </td>
                <td><a href="{{ route('usuarios/editar', $usuario['id']) }}">Editar</a></td>
                <td><a href="{{ route('usuarios/apagar', $usuario['id']) }}">Apagar</a></td>
            </tr>
        @endforeach
    </table>
@endsection
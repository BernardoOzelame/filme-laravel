@extends('base')

@section('titulo', 'Usuários')

@section ('conteudo')
    <div class="menu">
        <button class="hamburger" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </button>
        <div class="menu-links">
            <a href="{{ route('index') }}">Página Inicial</a>
            <a href="{{ route('filmes') }}">Filmes</a>
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </div>

    <a href="{{ route('usuarios/cadastrar') }}" class="btn btn-success btn-cadastrar">Cadastrar</a>

    <h1 class="text-center m-4">Listagem dos Usuários</h1>

    <div class="container">
        <table border="1" class="table table-striped table-hover">
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Usuário</th>           
                <th>Admin?</th>            
                <th></th>
            </tr>
            @foreach($usuarios as $usuario)
                <tr scope="row" class="align-middle">
                    <td>
                        <a title="Editar" href="{{ route('usuarios/editar', $usuario['id']) }}" class="text-decoration-none text-dark d-block p-2">
                            {{ $usuario['name'] }}
                        </a>
                    </td>
                    <td>
                        <a title="Editar" href="{{ route('usuarios/editar', $usuario['id']) }}" class="text-decoration-none text-dark d-block p-2">
                            {{ $usuario['email'] }}
                        </a>
                    </td>
                    <td>
                        <a title="Editar" href="{{ route('usuarios/editar', $usuario['id']) }}" class="text-decoration-none text-dark d-block p-2">
                            {{ $usuario['username'] }}
                        </a>
                    </td>
                    <td>
                        <a title="Editar" href="{{ route('usuarios/editar', $usuario['id']) }}" class="text-decoration-none text-dark d-block p-2">
                            @if($usuario['admin'] == 0) Não @else Sim @endif
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="#" class="btn-delete" data-id="{{ $usuario['id'] }}">
                            <i class="fa-solid fa-delete-left text-danger fs-4 text-center"></i>
                        </a>
                        <form id="delete-form-{{ $usuario['id'] }}" method="post" action="{{ route('usuarios/apagar', $usuario['id']) }}" style="display:none;">
                            @method('delete')
                            @csrf
                        </form>
                    </td>                  
                </tr>
            @endforeach
        </table>
    </div>
@endsection
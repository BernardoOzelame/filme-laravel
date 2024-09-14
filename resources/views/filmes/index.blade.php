@extends('base')
@extends('../usuarios/logout')

@section('titulo', 'Filmes')

@section ('conteudo')
    <div class="menu">
        <button class="hamburger" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </button>
        <div class="menu-links">
            <a href="{{ route('index') }}">Página Inicial</a>
            <a href="{{ route('usuarios') }}">Usuários</a>
            <a href="#" id="logout-link">Logout</a>
        </div>
    </div>

    <a href="{{ route('filmes/cadastrar') }}" class="btn btn-success btn-cadastrar">Cadastrar</a>
  
    <h1 class="text-center m-4">Listagem dos Filmes</h1>

    <div class="container">
        <table border="1" class="table table-striped table-hover">
            <tr>
                <th class="ps-3">Capa</th>
                <th class="ps-3">Nome</th>
                <th class="ps-3">Sinopse</th>
                <th class="ps-3">Ano</th>
                <th class="ps-3">Categoria</th>
                <th class="ps-3">Trailer</th>
                <th></th>
            </tr>
            @foreach($filmes as $filme)
                <tr scope="row" class="align-middle">
                    <td>
                        <a title="Ver capa do filme" class="text-decoration-none text-dark d-block p-2" data-bs-toggle="modal" data-bs-target="#imagemModal{{ $filme['id'] }}">
                            <img style="max-width: 100px" src="{{ asset('img/' . $filme['imagem']) }}">
                        </a>
                        <div class="modal fade" id="imagemModal{{ $filme['id'] }}" tabindex="-1" aria-labelledby="imagemModalLabel{{ $filme['id'] }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered"  style="min-width: 50% !important">
                                <div class="modal-content">
                                    <div class="modal-header" style="justify-content: center !important;">
                                        <h5 class="modal-title" id="imagemModalLabel{{ $filme['id'] }}">Capa do Filme</h5>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img style="max-width: 75%; max-height: 75%" src="{{ asset('img/' . $filme['imagem']) }}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>                    
                    <td>
                        <a title="Editar" href="{{ route('filmes/editar', $filme['id']) }}" class="text-decoration-none text-dark d-block p-2">
                            {{ $filme['nome'] }}
                        </a>
                    </td>
                    <td>
                        <a title="Editar" href="{{ route('filmes/editar', $filme['id']) }}" class="text-decoration-none text-dark d-block p-2">
                            {{ $filme['sinopse'] }}
                        </a>
                    </td>
                    <td>
                        <a title="Editar" href="{{ route('filmes/editar', $filme['id']) }}" class="text-decoration-none text-dark d-block p-2">
                            {{ $filme['ano'] }}
                        </a>
                    </td>
                    <td>
                        <a title="Editar" href="{{ route('filmes/editar', $filme['id']) }}" class="text-decoration-none text-dark d-block p-2">
                            {{ $filme['categoria'] }}
                        </a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#trailerModal{{ $filme['id'] }}">
                            Ver trailer
                        </button>

                        <div class="modal fade" id="trailerModal{{ $filme['id'] }}" tabindex="-1" aria-labelledby="trailerModalLabel{{ $filme['id'] }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="justify-content: center !important;">
                                        <h5 class="modal-title" id="trailerModalLabel{{ $filme['id'] }}">Trailer de "{{ $filme['nome'] }}"</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="ratio ratio-16x9">
                                            <?php
                                                $linkCompleto = $filme['linkTrailer'];
                                                $parsedUrl = parse_url($linkCompleto, PHP_URL_QUERY);
                                                $queryParams = [];
                                                parse_str($parsedUrl, $queryParams);
                                                $videoId = isset($queryParams['v']) ? $queryParams['v'] : null;
                                            ?>

                                            @if($videoId)
                                                <iframe
                                                    src="https://www.youtube.com/embed/{{ $videoId }}"
                                                    title="YouTube video player"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen>
                                                </iframe>
                                            @else
                                                <p>O link informado é inválido.</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <a href="#" class="btn-delete" data-id="{{ $filme['id'] }}">
                            <i class="fa-solid fa-delete-left text-danger fs-4 text-center"></i>
                        </a>
                        <form id="delete-form-{{ $filme['id'] }}" method="post" action="{{ route('filmes/apagar', $filme['id']) }}" style="display:none;">
                            @method('delete')
                            @csrf
                        </form>
                    </td>             
                </tr>
            @endforeach
        </table>
    </div>
@endsection
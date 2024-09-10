<p>
    <a href="{{ route('filmes/cadastrar') }}">Cadastrar filme</a>
</p>
<p>Veja nossa lista de filmes</p>

<table border="1">
    <tr>
        <th>Nome</th>
        <th>Sinopse</th>
        <th>Ano</th>
        <th>Categoria</th>
        <th>Trailer</th>
        <th></th>
    </tr>
    @foreach($filmes as $filme)
        <tr>
            <td>{{ $filme['nome'] }}</td>
            <td>{{ $filme['sinopse'] }}</td>
            <td>{{ $filme['ano'] }}</td>
            <td>{{ $filme['categoria'] }}</td>
            <td>
                <iframe width="150" height="75" 
                <?php
                    $linkCompleto = $filme['linkTrailer']; // O link completo do YouTube
                    $parsedUrl = parse_url($linkCompleto, PHP_URL_QUERY); // Pega a parte da query string
                    parse_str($parsedUrl, $queryParams); // Converte a query string em um array
                    $videoId = $queryParams['v']; // Pega o ID do vídeo
                ?>
                src="https://www.youtube.com/embed/{{ $videoId }}" 
                title="YouTube video player" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
                </iframe>
            </td>
            <td><a href="{{ route('filmes/apagar', $filme['id']) }}">Apagar</a></td>
            <td><a href="{{ route('filmes/editar', $filme['id']) }}">Editar</a></td>
        </tr>
    @endforeach
</table>
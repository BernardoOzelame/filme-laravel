<p>Tem certeza que quer apagar?</p>

<p><em><b>ID:</b> {{ $filmes['id'] }} - <b>Nome:</b> {{ $filmes['nome'] }}</em></p>

<form method="post" action="{{ route('filmes/apagar', $filmes['id']) }}">
    @method('delete')
    @csrf
    <input type="submit" value="Pode apagar sem medo" style="background-color: red; color: white;">
</form>

<a href="{{ route('filmes') }}">Cancelar</a>
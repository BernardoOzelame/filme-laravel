
<!-- <p>Preencha o formulário</p> -->

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

<!-- <form method="post" action="{{ route('filmes/gravar') }}">
    @csrf
    <input type="text" name="nome" placeholder="Nome" value="{{ old('nome') }}">
    <br>
    <input type="text" name="cargo" placeholder="Cargo" value="{{ old('cargo') }}">
    <br>
    <input type="text" name="departamento" placeholder="Departamento" value="{{ old('departamento') }}">
    <br>
    <input type="number" step='any' name="salario" placeholder="Salário" value="{{ old('salario') }}">
    <br>
    <input type="submit" value="Gravar">
</form> -->

    <div >
        <form method="post" enctype="multipart/form-data" action="{{ route('filmes/gravar') }}">
        @csrf
            <div >
                <label for="name">Nome</label>
                    <input placeholder="Nome" value="{{ old('nome') }}" name="nome" type="text">
            </div>
            <div >
                <label for="sinopse">Sinopse</label>
                    <input placeholder="Sinopse" value="{{ old('sinopse') }}" name="sinopse" type="text">
            </div>
            <div >
                <label for="ano">Ano</label>
                    <input placeholder="Ano" value="{{ old('ano') }}" name="ano" type="number">
            </div>
            <div>
                <label for="categoria">Categoria</label>
                    <input placeholder="Categoria" value="{{ old('categoria') }}" name="categoria" type="text">
            </div>
            <div >
                <label for="categoria">Link do trailer</label>
                    <input placeholder="Link do trailer" value="{{ old('linkTrailer') }}" name="linkTrailer" type="text">
            </div>
            <div>
                <button type="submit">Gravar</button>
            </div>
        </form>
    </div>

@if($errors->any())
    <div>
        <h4>Preenche a porcaria do formulário</h4>
        <ul>
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('login') }}" method="post">
    @csrf
    <div>
        <label for="username">Usuário</label>
        <input id="username" name="username" type="text" required placeholder="Usuário" aria-label="Usuário">
    </div>
    <div>
        <label for="password">Senha</label>
        <input id="password" name="password" type="text" required placeholder="Senha" aria-label="Senha">
    </div>
    <div>
        <button type="submit">Entrar</button>
    </div>
</form>

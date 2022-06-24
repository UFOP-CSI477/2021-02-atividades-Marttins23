<form action="{{ $action }}" method="post">
    @csrf

    @isset($nome)
        @method('PUT')
    @endisset
    <div class="row">
        <div class="col-9">
            <label for="nome">Nome</label>
            <input type="text"
                   class="form-control"
                   name="nome"
                   id="nome"
                   @isset($nome)value="{{ $nome }}"@endisset>
        </div>
        {{ $slot }}
    </div>
    <button type="submit" class="btn btn-dark mt-2">
        Salvar
    </button>
</form>

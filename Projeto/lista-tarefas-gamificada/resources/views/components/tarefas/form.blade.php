<form action="{{ $action }}" method="post">
    @csrf

    @isset($descricao)
        @method('PUT')
    @endisset
    <div class="row">
        <div class="col-9">
            <label for="nome">Descrição</label>
            <input type="text"
                   class="form-control"
                   name="descricao"
                   id="descricao"
                   @isset($descricao)value="{{ $descricao }}"@endisset>
        </div>
        {{ $slot }}
    </div>
    <button type="submit" class="btn btn-dark mt-2">
        Salvar
    </button>
</form>

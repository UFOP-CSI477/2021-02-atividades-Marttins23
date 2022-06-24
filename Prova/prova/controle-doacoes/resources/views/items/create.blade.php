<x-template title="Cadastro de Itens">
    <form action="{{ route('items.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-9">
                <label for="nome">Descrição</label>
                <input type="text"
                       class="form-control"
                       name="descricao"
                       id="descricao">
            </div>
        </div>
        <button type="submit" class="btn btn-dark mt-2">
            Salvar
        </button>
    </form>
</x-template>

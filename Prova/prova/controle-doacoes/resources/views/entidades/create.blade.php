<x-template title="Cadastro de Entidades">
    <form action="{{ route('entidades.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <label for="nome">Nome</label>
                <input type="text"
                       class="form-control"
                       name="nome"
                       id="nome">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <label for="bairro">Bairro</label>
                <input type="text"
                       class="form-control"
                       name="bairro"
                       id="bairro">
            </div>
            <div class="col">
                <label for="cidade">Cidade</label>
                <input type="text"
                       class="form-control"
                       name="cidade"
                       id="cidade">
            </div>
            <div class="col">
                <label for="estado">Estado</label>
                <input type="text"
                       class="form-control"
                       name="estado"
                       id="estado">
            </div>
        </div>
        <button type="submit" class="btn btn-dark mt-2">
            Salvar
        </button>
    </form>
</x-template>

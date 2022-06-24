<x-template title="Cadastro de Coletas">
    <form action="{{ route('coletas.store') }}" method="post">
        @csrf
        <div class="row">

            <div class="col">
                <label for="items-id">ID do Item</label>
                <select name="items_id" class="form-control">
                    @foreach($items as $item)
                        <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->descricao}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="items-id">ID da Entidade</label>
                <select name="entidades_id" class="form-control">
                    @foreach($entidades as $entidade)
                        <option value="{{ $entidade->id }}">{{ $entidade->id }} - {{ $entidade->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="quantidade">Quantidade</label>
                <input type="number"
                       class="form-control"
                       name="quantidade"
                       id="quantidade">
            </div>
            <div class="col">
                <label for="data">Data</label>
                <input type="date"
                       class="form-control"
                       name="data"
                       id="data">
            </div>
        </div>
        <button type="submit" class="btn btn-dark mt-2">
            Salvar
        </button>
    </form>
</x-template>

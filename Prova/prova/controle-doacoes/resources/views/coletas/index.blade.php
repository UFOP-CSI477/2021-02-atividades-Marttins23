<x-template title="Coletas">
    <a href="{{ route('coletas.create') }}" class="btn btn-dark mb-3">Nova Coleta</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Item ID</th>
            <th scope="col">Entidade ID</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Data</th>
            <th scope="col">Excluir</th>
        </tr>
        </thead>
        <tbody>
        @foreach($coletas as $coleta)
            <tr>
                <th scope="row"> {{ $coleta->items_id }}</th>
                <td>{{ $coleta->entidades_id }}</td>
                <td>{{ $coleta->quantidade }}</td>
                <td>{{ $coleta->data }}</td>
                <td>
                    <form name="formDelete"
                          action="{{ route('coletas.destroy', $coleta->id) }}"
                          method="post"
                          onsubmit="return confirm('Deseja realmente excluir a Coleta?');">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger btn-sm" title="Excluir">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-template>

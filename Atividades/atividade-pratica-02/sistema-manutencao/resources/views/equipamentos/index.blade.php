<x-template title="Equipamentos">
    <a href="{{ route('equipamentos.create') }}" class="btn btn-dark mb-3">Novo Equipamento</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="col-1">Id</th>
            <th scope="col">Nome</th>
            <th scope="col" class="col-1">Editar</th>
            <th scope="col" class="col-1">Excluir</th>
        </tr>
        </thead>
        <tbody>
        @foreach($equipamentos as $equipamento)
        <tr>
            <th scope="row"> {{ $equipamento->id }}</th>
            <td>{{ $equipamento->nome }}</td>
            <td>
                <a href="{{ route('equipamentos.edit', $equipamento->id) }}" class="btn btn-info btn-sm mr-1" title="Ver detalhes e editar">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </td>
            <td>
                <form name="formDelete"
                      action="{{ route('equipamentos.destroy', $equipamento->id) }}"
                      method="post"
                      onsubmit="return confirm('Deseja realmente excluir o Equipamento?');">
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

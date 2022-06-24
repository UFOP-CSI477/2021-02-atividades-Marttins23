<x-template title="Manutenções">
    <a href="{{ route('registros.create') }}" class="btn btn-dark mb-3">Nova Manutenção</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="col-1">Id</th>
            <th scope="col">Descrição</th>
            <th scope="col" class="col-2">Tipo</th>
            <th scope="col" class="col-3">Usuário</th>
            <th scope="col" class="col-3">Equipamento</th>
            <th scope="col" class="col-2">Data Limite</th>
            <th scope="col" class="col-1">Editar</th>
            <th scope="col" class="col-1">Excluir</th>
        </tr>
        </thead>
        <tbody>
        @foreach($registros as $registro)
            <tr>
                <th scope="row"> {{ $registro->id }}</th>
                <td>{{ $registro->descricao }}</td>
                <td>{{ $registro->tipo }}</td>
                <td>{{ $registro->name }}</td>
                <td>{{ $registro->nome }}</td>
                <td>{{ $registro->datalimite }}</td>
                <td>
                    <a href="{{ route('registros.edit', $registro->id) }}" class="btn btn-info btn-sm mr-1" title="Ver detalhes e editar">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                </td>
                <td>
                    <form name="formDelete"
                          action="{{ route('registros.destroy', $registro->id) }}"
                          method="post"
                          onsubmit="return confirm('Deseja realmente excluir o Registro?');">
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

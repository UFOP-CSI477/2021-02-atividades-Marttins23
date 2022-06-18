<x-template title="Entidades">
    <a href="{{ route('entidades.create') }}" class="btn btn-dark mb-3">Nova Entidade</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Bairro</th>
            <th scope="col">Cidade</th>
            <th scope="col">Estado</th>
            <th scope="col">Excluir</th>
        </tr>
        </thead>
        <tbody>
        @foreach($entidades as $entidade)
            <tr>
                <th scope="row"> {{ $entidade->nome }}</th>
                <td>{{ $entidade->bairro }}</td>
                <td>{{ $entidade->cidade }}</td>
                <td>{{ $entidade->estado }}</td>
                <td>
                    <form name="formDelete"
                          action="{{ route('entidades.destroy', $entidade->id) }}"
                          method="post"
                          onsubmit="return confirm('Deseja realmente excluir a Entidade?');">
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

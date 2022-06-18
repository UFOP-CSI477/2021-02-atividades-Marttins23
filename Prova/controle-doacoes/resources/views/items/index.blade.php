<x-template title="Itens">
    <a href="{{ route('items.create') }}" class="btn btn-dark mb-3">Novo Item</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Descrição</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <th scope="row"> {{ $item->id }}</th>
                <td>{{ $item->descricao }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-template>

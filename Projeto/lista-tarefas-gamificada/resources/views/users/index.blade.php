<x-template title="Ranking de Usuários">
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="cols">Posição</th>
            <th scope="col">Nome</th>
            <th scope="col">Pontuação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <th scope="row"> {{ $loop->iteration }}</th>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->pontuacao }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-template>

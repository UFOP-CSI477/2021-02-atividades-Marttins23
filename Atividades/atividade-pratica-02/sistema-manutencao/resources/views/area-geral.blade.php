<x-template title="Área Geral - Suporte">
    <h2>Equipamentos</h2>
    <table class="table table-bordered mb-5">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="col-1">ID</th>
            <th scope="col">Nome</th>
        </tr>
        </thead>
        <tbody>
        @foreach($equipamentos as $equipamento)
            <tr>
                <th scope="row">{{ $equipamento->id }}</th>
                <td>{{ $equipamento->nome }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2>Manutenções</h2>
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="col-2">Data Limite</th>
            <th scope="col">Equipamento</th>
            <th scope="col" class="col-3">Usuário</th>
            <th scope="col" class="col-1">Tipo</th>
            <th scope="col">Descrição</th>
        </tr>
        </thead>
        <tbody>
        @foreach($registros as $registro)
            <tr>
                <th scope="row">{{ $registro->datalimite }}</th>
                <td>{{ $registro->nome }}</td>
                <td>{{ $registro->name }}</td>
                <td>
                    @if($registro->tipo == 1)
                        Preventiva
                    @elseif($registro->tipo == 2)
                        Corretiva
                    @else
                        Urgente
                    @endif
                </td>
                <td>{{ $registro->descricao }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-template>

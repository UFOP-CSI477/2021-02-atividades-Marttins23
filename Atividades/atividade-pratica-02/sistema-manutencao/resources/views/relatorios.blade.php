<x-template title="Relatórios">
    <h2>Relatório de Usuários</h2>
    <table class="table table-bordered mb-5">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="col-1">ID</th>
            <th scope="col">Nome</th>
        </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <th scope="row">{{ $usuario->id }}</th>
                <td>{{ $usuario->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2>Relatório de Manutenções</h2>
    @foreach($registros as $registro)
    @isset($registro[0]->nome)
        <h4 class="mt-3">{{ $registro[0]->nome }}</h4>
    @endisset
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="col-2">Data Limite</th>
            <th scope="col" class="col-3">Usuário</th>
            <th scope="col" class="col-1">Tipo</th>
            <th scope="col">Descrição</th>
        </tr>
        </thead>
        <tbody>
        @foreach($registro as $registro_equipamento)
            <tr>
                <th scope="row">{{ $registro_equipamento->datalimite }}</th>
                <td>{{ $registro_equipamento->name }}</td>
                <td>
                    @if($registro_equipamento->tipo == 1)
                        Preventiva
                    @elseif($registro_equipamento->tipo == 2)
                        Corretiva
                    @else
                        Urgente
                    @endif
                </td>
                <td>{{ $registro_equipamento->descricao }}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot class="text-white bg-secondary">
        <tr>
            <th scope="row" class="col-2"> TOTAL </th>
            <td class="col-3"></td>
            <td class="col-1"></td>
            <td class="col"></td>
        </tr>
        </tfoot>
    </table>
    @endforeach
</x-template>

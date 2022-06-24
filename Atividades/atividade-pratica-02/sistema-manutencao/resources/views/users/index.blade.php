<x-template title="Usuários">
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="col-1">Id</th>
            <th scope="col">Nome</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row"> {{ $user->id }}</th>
                <td>{{ $user->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-template>

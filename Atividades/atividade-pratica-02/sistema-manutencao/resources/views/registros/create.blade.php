<x-template title="Cadastrar Manutenção">
    <x-registros.form action="{{ route('registros.store') }}" :users="$users" :equipamentos="$equipamentos"/>
</x-template>

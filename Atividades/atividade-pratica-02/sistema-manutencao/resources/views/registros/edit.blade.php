<x-template title="Editar Manutenção ' {{ $registro->descricao }} '">
    <x-registros.form :action="route('registros.update', $registro->id)" :registro="$registro" :users="$users" :equipamentos="$equipamentos"/>
</x-template>

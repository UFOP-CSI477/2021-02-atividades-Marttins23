<x-template title="Editar Equipamento '{{ $equipamento->nome }}'">
    <x-equipamentos.form :action="route('equipamentos.update', $equipamento->id)" :nome="$equipamento->nome"/>
</x-template>


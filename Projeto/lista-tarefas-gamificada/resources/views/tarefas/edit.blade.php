<x-template title="Editar Tarefa '{{ $tarefa->descricao }}'">
    <x-tarefas.form :action="route('tarefas.update', $tarefa->id)" :descricao="$tarefa->descricao"/>
</x-template>

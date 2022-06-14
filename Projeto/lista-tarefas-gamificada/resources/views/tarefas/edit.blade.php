<x-template title="Editar Tarefa '{{ $tarefa->descricao }}'">
    <x-tarefas.form :action="route('tarefas.update', $tarefa->id)" :descricao="$tarefa->descricao" :concluida="$tarefa->concluida">
        @if($tarefa->concluida == 1)
            <div class="form-check align-self-end pb-2 col-3">
                <input type="hidden" name="concluida" value="0"/>
                <input class="form-check-input" name="concluida" type="checkbox" value="1" checked="true" id="concluida">
                <label class="form-check-label" for="concluida">
                    Concluída
                </label>
            </div>
        @endif
    </x-tarefas.form>
</x-template>

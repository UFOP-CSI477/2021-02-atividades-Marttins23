<x-template title="Tarefas">

    @if(session('mensagem'))
        <div class="alert alert-success">
            {{ session('mensagem') }}
        </div>
    @endif
    <a href="{{ route('tarefas.create') }}" class="btn btn-dark mb-2">Adicionar</a>
    <ul class="list-group">
        @foreach($tarefas as $tarefa)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $tarefa->descricao }}

                <span class="d-flex">
                    <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn btn-info btn-sm mr-1" title="Ver detalhes e editar">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                    <form name="formConcluida"
                          action="{{ route('tarefas.concluir', $tarefa->id) }}"
                          method="post">
                        @csrf
                        <button class="btn btn-success btn-sm mr-1" title="Marcar como concluída">
                            <i class="fa-solid fa-check"></i>
                        </button>
                    </form>
                    <form name="formDelete"
                          action="{{ route('tarefas.destroy', $tarefa->id) }}"
                          method="post"
                          onsubmit="return confirm('Deseja realmente excluir a Tarefa?');">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger btn-sm" title="Excluir">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>
</x-template>

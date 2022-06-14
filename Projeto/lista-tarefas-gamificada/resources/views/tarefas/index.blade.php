<x-template title="Tarefas">
        <a href="{{ route('tarefas.create') }}" class="btn btn-dark mb-3">Nova Tarefa</a>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-nao-concluidas" data-toggle="tab" href="#nao-concluidas" role="tab" aria-controls="tab-nao-concluidas" aria-selected="true">Não Concluídas</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#concluidas" role="tab" aria-controls="tab-concluidas" aria-selected="false">Concluídas</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="nao-concluidas" role="tabpanel" aria-labelledby="tab-nao-concluidas">
                <ul class="list-group">
                    @foreach($tarefas_nao_concluidas as $tarefa_nao_concluida)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $tarefa_nao_concluida->descricao }}

                            <span class="d-flex">
                    <a href="{{ route('tarefas.edit', $tarefa_nao_concluida->id) }}" class="btn btn-info btn-sm mr-1" title="Ver detalhes e editar">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                    <form name="formConcluida"
                          action="{{ route('tarefas.concluir', $tarefa_nao_concluida->id) }}"
                          method="post">
                        @csrf
                        <button class="btn btn-success btn-sm mr-1" title="Marcar como concluída">
                            <i class="fa-solid fa-check"></i>
                        </button>
                    </form>
                    <form name="formDelete"
                          action="{{ route('tarefas.destroy', $tarefa_nao_concluida->id) }}"
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
            </div>
            <div class="tab-pane fade" id="concluidas" role="tabpanel" aria-labelledby="tab-concluidas">
                <ul class="list-group">
                    @foreach($tarefas_concluidas as $tarefa_concluida)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $tarefa_concluida->descricao }}

                            <span class="d-flex">
                    <a href="{{ route('tarefas.edit', $tarefa_concluida->id) }}" class="btn btn-info btn-sm mr-1" title="Ver detalhes e editar">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                    <form name="formDelete"
                          action="{{ route('tarefas.destroy', $tarefa_concluida->id) }}"
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
            </div>
        </div>
</x-template>

<form action="{{ $action }}" method="post">
    @csrf

    @isset($registro)
        @method('PUT')
    @endisset
    <div class="row">
        <div class="col">
            <label for="descricao">Descrição</label>
            <input type="text"
                   class="form-control"
                   name="descricao"
                   id="descricao"
                   @isset($registro->descricao)value="{{ $registro->descricao }}"@endisset
            >
        </div>
        <div class="col">
            <label for="users_id">ID do Usuário</label>
            <select name="users_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @isset($registro)
                                                        @if($user->id == $registro->users_id)
                                                            selected
                                                        @endif
                                                    @endisset>
                        {{ $user->id }} - {{ $user->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="equipamentos_id">ID do Equipamento</label>
            <select name="equipamentos_id" class="form-control">
                @foreach($equipamentos as $equipamento)
                    <option value="{{ $equipamento->id }}" @isset($registro)
                                                               @if($equipamento->id == $registro->equipamentos_id)
                                                                   selected
                                                               @endif
                                                           @endisset>
                        {{ $equipamento->id }} - {{ $equipamento->nome}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="tipo">Tipo</label>
            <select name="tipo" class="form-control">
                    <option value="1" @isset($registro)
                                          @if($registro->tipo == 1)
                                              selected
                                          @endif
                                      @endisset>
                        1 - Preventiva
                    </option>
                    <option value="2" @isset($registro)
                                          @if($registro->tipo == 2)
                                              selected
                                          @endif
                                      @endisset>
                        1 - Corretiva
                    </option>
                <option value="3" @isset($registro)
                                      @if($registro->tipo == 3)
                                          selected
                                      @endif
                                  @endisset>
                    3 - Urgente
                </option>

            </select>
        </div>

        <div class="col">
            <label for="datalimite">Data Limite</label>
            <input type="date"
                   class="form-control"
                   name="datalimite"
                   id="datalimite" @isset($registro)
                                       value="{{ $registro->datalimite }}"
                                   @endisset>
        </div>
    </div>
    <button type="submit" class="btn btn-dark mt-2">
        Salvar
    </button>
</form>

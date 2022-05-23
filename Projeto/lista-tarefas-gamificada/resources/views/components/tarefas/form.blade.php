@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ $action }}" method="post">
    @csrf

    @isset($descricao)
        @method('PUT')
    @endisset
    <div class="row">
        <div class="col col-8">
            <label for="nome">Descrição</label>
            <input type="text"
                   class="form-control"
                   name="descricao"
                   id="descricao"
                   @isset($descricao)value="{{ $descricao }}"@endisset>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Adicionar</button>
</form>

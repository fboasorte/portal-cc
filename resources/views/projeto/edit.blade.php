@extends('layouts.projeto')

@section('title', 'Editar Projeto')

@section('content')
    <form method="post" action="{{ route('projeto.update', ['id' => $projeto->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" placeholder="Descrição do projeto" required>{{ $projeto->descricao }}</textarea>
        </div>

        <div class="form-group">
            <label for="titulo">Data de Início</label>
            <input value="{{ $projeto->data_inicio }}" type="date" name="data_inicio" id="data_inicio" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="titulo">Data de Termino</label>
            <input value="{{ $projeto->data_termino }}" type="date" name="data_termino" id="data_termino" class="form-control">
        </div>

        <div class="form-group">
            <label for="titulo">Resultados</label>
            <input value="{{ $projeto->resultados }}" type="text" name="resultados" id="resultados" class="form-control"
                placeholder="Resultados do projeto">
        </div>

        <div class="form-group">
            <label for="titulo">Palavras Chave</label>
            <input value="{{ $projeto->palavras_chave }}" type="text" name="palavras_chave" id="palavras_chave" class="form-control"
                placeholder="Palavras Chave" required>
        </div>

        <div class="form-group">
            <label for="professor_id">Professor Responsável</label>
            <select class="professor_id form-control" style="width:500px;" name="professor_id" id="professor_id">
                <option value="{{ $projeto->professor_id }}" selected>
                    {{ $projeto->professor->nome }}
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>

    </form>

    <script type="text/javascript">
        $('.professor_id').select2({
            placeholder: 'Selecione o professor responsável',
            ajax: {
                url: '/projeto/busca-professor',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nome,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
@stop

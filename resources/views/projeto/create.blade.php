@extends('layouts.projeto')

@section('title', 'Criar Projeto')

@section('content')
    <form method="post" action="{{ route('projeto.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" placeholder="Descrição do projeto" required></textarea>
        </div>

        <div class="form-group">
            <label for="data_inicio">Data de Início</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="data_termino">Data de Termino</label>
            <input type="date" name="data_termino" id="data_termino" class="form-control">
        </div>

        <div class="form-group">
            <label for="resultados">Resultados</label>
            <input type="text" name="resultados" id="resultados" class="form-control"
                placeholder="Resultados do projeto">
        </div>

        <div class="form-group">
            <label for="palavras_chave">Palavras Chave</label>
            <input type="text" name="palavras_chave" id="palavras_chave" class="form-control"
                placeholder="Palavras Chave" required>
        </div>

        <div class="form-group">
            <label for="professor_id">Professor Responsável</label>
            <select class="professor_id form-control" style="width:500px;" name="professor_id" id="professor_id"></select>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>

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

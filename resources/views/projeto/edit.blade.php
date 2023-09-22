@extends('layouts.main')

@section('title', 'Editar Projeto')

@section('content')
<div class="custom-container">
    <div>
        <div>
            <i class="fas fa-envelopes-bulk fa-2x"></i>
            <h3 class="smaller-font">Gerenciar Projeto</h3>
        </div>
    </div>
</div>
<div class="container">
    <form method="post" action="{{ route('projeto.update', ['id' => $projeto->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" placeholder="Descrição do projeto" required>{{ $projeto->descricao }}</textarea>
        </div>

        <div class="form-group">
            <label for="titulo">Data de Início</label>
            <input value="{{ $projeto->data_inicio }}" type="date" name="data_inicio" id="data_inicio"
                class="form-control" required>
        </div>

        <div class="form-group">
            <label for="titulo">Data de Termino</label>
            <input value="{{ $projeto->data_termino }}" type="date" name="data_termino" id="data_termino"
                class="form-control">
        </div>

        <div class="form-group">
            <label for="titulo">Resultados</label>
            <input value="{{ $projeto->resultados }}" type="text" name="resultados" id="resultados" class="form-control"
                placeholder="Resultados do projeto">
        </div>

        <div class="form-group">
            <label for="titulo">Palavras Chave</label>
            <input value="{{ $projeto->palavras_chave }}" type="text" name="palavras_chave" id="palavras_chave"
                class="form-control" placeholder="Palavras Chave" required>
        </div>

        <div class="form-group">
            <label for="professor_id">Professor Responsável</label>
            <select class="form-control" name="professor_id" id="professor_id">
                <option value="{{ $projeto->professor_id }}" selected>
                    {{ $projeto->professor->servidor->nome }}
                </option>
            </select>
        </div>

        <div class="col-md-3 mb-3 d-flex align-items-end">
            <a href="" class="btn custom-button modal-trigger" data-bs-toggle="modal"
                data-bs-target="#createProfessor">Cadastrar professor</a>
        </div>
        @include('modal.createProfessor')

        <div class="form-group">
            <label for="alunos">Alunos Participantes</label>
            <select class="form-control" name="alunos[]" id="alunos" multiple>
                @foreach ($alunos as $aluno)
                    <option value="{{ $aluno->id }}" selected> {{ $aluno->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3 mb-3 d-flex align-items-end">
            <a href="" class="btn custom-button modal-trigger" data-bs-toggle="modal"
                data-bs-target="#createAluno">Cadastrar aluno</a>
        </div>
        @include('modal.createAluno')

        <button type="submit" class="btn custom-button btn-default">Salvar</button>
        <button class="btn custom-button custom-button-castastrar-tcc btn-default"><a href="{{route('projeto.index')}} "class= "btn-back" >Cancelar</a></button>

    </form>

    <script type="text/javascript">
        $('#professor_id').select2({
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

        $('#alunos').select2({
            placeholder: 'Selecione um aluno para o projeto',
            ajax: {
                url: '/projeto/busca-aluno',
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
</div>
@stop

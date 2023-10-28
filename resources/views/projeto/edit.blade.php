@extends('layouts.main')

@section('title', 'Editar Projeto')

@section('content')
    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-envelopes-bulk fa-2x"></i>
                <h3 class="smaller-font">Editar Projeto</h3>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <form method="post" action="{{ route('projeto.update', ['id' => $projeto->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titulo" class="form-label">Descrição: </label>
                <textarea name="descricao" id="descricao" required class="form-control @error('descricao') is-invalid @enderror">{{ old('descricao') ?? $projeto->descricao }}</textarea>

                @error('descricao')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="titulo" class="form-label">Data de Início: </label>
                <input value="{{ old('data_inicio') ?? $projeto->data_inicio }}" type="date" name="data_inicio"
                    id="data_inicio" class="form-control @error('data_inicio') is-invalid @enderror" required>

                @error('data_inicio')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="titulo" class="form-label">Data de Termino: </label>
                <input value="{{ old('data_termino') ?? $projeto->data_termino }}" type="date" name="data_termino"
                    id="data_termino" class="form-control @error('data_termino') is-invalid @enderror">

                @error('data_termino')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="titulo" class="form-label">Resultados: </label>
                <input value="{{ old('resultados') ?? $projeto->resultados }}" type="text" name="resultados"
                    id="resultados" class="form-control @error('resultados') is-invalid @enderror"
                    placeholder="Resultados do projeto">

                @error('resultados')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="titulo" class="form-label">Palavras-Chave:</label>
                <input value="{{ old('palavras_chave') ?? $projeto->palavras_chave }}" type="text"
                    class="form-control @error('palavras_chave') is-invalid @enderror" name="palavras_chave"
                    id="palavras_chave" placeholder="Palavras Chave">

                @error('palavras_chave')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="fomento" class="form-label">Fomento:</label>
                <input value="{{ old('fomento') ?? $projeto->fomento }}" type="text" 
                    name="fomento" id="fomento" value="{{ old('fomento') }}"
                    class="form-control @error('fomento') is-invalid @enderror" placeholder="Fomento">

                @error('fomento')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="link" class="form-label">Link:</label>
                <input value="{{ old('link') ?? $projeto->link }}" type="url" 
                    name="link" id="link" value="{{ old('link') }}"
                    class="form-control @error('link') is-invalid @enderror" placeholder="Link">

                @error('link')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="professor_id" class="form-label">Professor Responsável: </label>
                <select class="form-control" name="professor_id" id="professor_id">
                    <option value="{{ $projeto->professor_id }}" selected>
                        {{ $projeto->professor->servidor->nome }}
                    </option>
                </select>

                @error('professor_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-3 mb-3 d-flex align-items-end">
                <a href="" class="btn custom-button modal-trigger" data-bs-toggle="modal"
                    data-bs-target="#createProfessor">Cadastrar professor</a>
            </div>


            <div class="form-group">
                <label for="alunos" class="form-label">Alunos Participantes: </label>
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


            <button type="submit" class="btn custom-button btn-default">Salvar</button>
            <a href="{{ route('projeto.index') }} "
                class="btn custom-button custom-button-castastrar-tcc btn-default">Cancelar</a>

        </form>

        @include('modal.createProfessor')
        @include('modal.createAluno')

        <script type="text/javascript">
            $('#professor_id').select2({
                placeholder: 'Selecione o professor responsável',
                language: {
                    noResults: function() {
                        return "Resultados não encontrados";
                    },
                    inputTooShort: function() {
                        return "Digite 1 ou mais caracteres";
                    }
                },
                minimumInputLength: 1,
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
                language: {
                    noResults: function() {
                        return "Resultados não encontrados";
                    },
                    inputTooShort: function() {
                        return "Digite 1 ou mais caracteres";
                    }
                },
                minimumInputLength: 1,
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
    <div class="text-center mt-4">
        <a href="{{ url()->previous() }}" class="btn custom-button custom-button-castastrar-tcc btn-default">Voltar</a>
    </div>
@stop

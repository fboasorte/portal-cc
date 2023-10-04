@extends('layouts.main')

@section('title', 'Criar Projeto')

@section('content')
    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-envelopes-bulk fa-2x"></i>
                <h3 class="smaller-font">Cadastro de Projeto</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <form method="post" action="{{ route('projeto.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" placeholder="Descrição do projeto" required
                    class="form-control @error('descricao') is-invalid @enderror">{{ old('descricao') }}</textarea>

                @error('descricao')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="data_inicio">Data de Início</label>
                <input type="date" name="data_inicio" id="data_inicio" value="{{ old('data_inicio') }}"
                    class="form-control @error('data_inicio') is-invalid @enderror" required>

                @error('data_inicio')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="data_termino">Data de Termino</label>
                <input type="date" name="data_termino" id="data_termino" value="{{ old('data_termino') }}"
                    class="form-control @error('data_termino') is-invalid @enderror">

                @error('data_termino')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="resultados">Resultados</label>
                <input type="text" name="resultados" id="resultados" value="{{ old('resultados') }}"
                    class="form-control @error('resultados') is-invalid @enderror" placeholder="Resultados do projeto">

                @error('resultados')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="palavras_chave">Palavras Chave</label>
                <input type="text" name="palavras_chave" id="palavras_chave" value="{{ old('palavras_chave') }}"
                    class="form-control @error('palavras_chave') is-invalid @enderror" placeholder="Palavras Chave">

                @error('palavras_chave')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="professor_id">Professor Responsável</label>
                <select name="professor_id" id="professor_id" class="form-select"></select>

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
                <label for="aluno_id">Alunos Participantes</label>
                <select class="form-select" name="alunos[]" id="alunos" multiple></select>
            </div>

            <div class="col-md-3 mb-3 d-flex align-items-end">
                <a href="" class="btn custom-button modal-trigger" data-bs-toggle="modal"
                    data-bs-target="#createAluno">Cadastrar aluno</a>
            </div>


            <button type="submit" class="btn custom-button btn-default">Cadastrar</button>
            <a href="{{ route('projeto.index') }} "
                class="btn custom-button custom-button-castastrar-tcc btn-default">Cancelar</a>

        </form>

        @include('modal.createProfessor')
        @include('modal.createAluno')

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

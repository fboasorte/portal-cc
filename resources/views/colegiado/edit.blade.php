@extends('layouts.main')

@section('title', 'Editar Colegiado')

@section('content')
<div class="custom-container">
    <div>
        <div>
            <i class="fas fa-chalkboard fa-2x"></i>
            <h3 class="smaller-font">Editar colegiado</h3>
        </div>
    </div>
</div>
<div class="container mt-4">
    <form method="post" action="{{ route('colegiado.update', [$colegiado->id]) }}" enctype="multipart/form-data" id="form-colegiado">
        @method('PUT')
        @csrf
        <div class="form-group">
            <div class="form-group">
                <div class="mb-3">
                    <h5>Portaria PDF</h5>
                    <label for="arquivo" class="form-label">Arquivo</label>
                    <input type="file" name="arquivo" id="arquivo" class="form-control">
                </div>
            </div>

            <div>
                <div class="mb-3">
                    <label for="local" class="form-label">Número portaria*</label>
                    <input type="number" name="numero_portaria" id="numero_portaria" class="form-control" value="{{ $colegiado->numero_portaria }}" required>
                </div>
                <div class="mb-3">
                    <label for="vigencia" class="form-label">Vigência*</label>
                    <input type="date" name="vigencia_inicio" id="vigencia_inicio" class="form-control" value="{{ date('Y-m-d', strtotime($colegiado->inicio)) }}" required> até

                    <input type="date" name="vigencia_fim" id="vigencia_fim" class="form-control" required min="{{ date('Y-m-d', strtotime($colegiado->inicio)) }}" value="{{ date('Y-m-d', strtotime($colegiado->fim)) }}" required>
                </div>
                <div class="mb-3">
                    <label for="atual" class="form-label">Colegiado atual?</label>
                    <input type="checkbox" name="atual" id="atual" {{$colegiado->atual == 1 ? 'checked' : ''}}>
                    <br>
                    <span id="mensagem-data" class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <h5>Professores </h5>

            <div class="form-group" id="professores">
                <div class="mb-3">
                    <label for="professores" class="form-label">Selecione 4 professores: </label>

                    @foreach ($professores as $professor)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="professores[]" id="professor_{{ $professor->id }}" value="{{ $professor->id }}" {{ $colegiado->professores->contains($professor->id) ? 'checked' : '' }}>
                        <label for="professor_{{ $professor->id }}" class="form-check-label">{{ $professor->servidor->nome }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            <a href="" class="btn custom-button modal-trigger" data-bs-toggle="modal" data-bs-target="#createProfessor">Cadastrar novo professor</a>


            <div class="form-group" id="alunos">

                    <br>
                    <h5>Alunos</h5>
                    <label for="" class="form-label">Selecione pelo menos 1 e no máximo 4 alunos: </label>

                    @foreach ($alunos as $aluno)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="alunos[]" id="aluno_{{ $aluno->id }}" value="{{ $aluno->id }}" {{ $colegiado->alunos->contains($aluno->id) ? 'checked' : '' }}>
                        <label for="aluno_{{ $aluno->id }}" class="form-check-label">{{ $aluno->nome }}</label>
                    </div>
                    @endforeach

            </div>
            <a href="" class="btn custom-button modal-trigger" data-bs-toggle="modal" data-bs-target="#createAluno">Cadastrar aluno</a>

            <div class="form-group" id="servidores">
                <br>
                <h5>Servidor</h5>
                <label for="" class="form-label">Selecione pelo menos 1 e no máximo 4 servidores para técnicos administrativos:
                </label>

                @foreach ($servidores as $servidor)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="servidores[]" id="servidor_{{ $servidor->id }}" value="{{ $servidor->id }}" {{ $colegiado->tecnicosAdm->contains($servidor->id) ? 'checked' : '' }}>
                    <label for="servidor_{{ $servidor->id }}" class="form-check-label">{{ $servidor->nome }}</label>
                </div>
                @endforeach

            </div>
            <a href="" class="btn custom-button modal-trigger" data-bs-toggle="modal" data-bs-target="#createServidor">Cadastrar servidor</a>
        </div>
        <button type="submit" class="btn custom-button custom-button-castastrar-tcc btn-default">Atualizar</button>
        <a href="{{ route('colegiado.index') }} " class="btn custom-button custom-button-castastrar-tcc btn-default">Cancelar</a>
    </form>
    <div class="text-center mt-4">
        <a href="{{ url()->previous() }}" class="btn custom-button custom-button-castastrar-tcc btn-default">Voltar</a>
    </div>
</div>
@include('modal.createProfessor')
@include('modal.createAluno')
@include('modal.createServidor')
@stop
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var $vigenciaInicio = $('#vigencia_inicio');
        var $vigenciaFim = $('#vigencia_fim');
        var $atual = $('#atual');
        var $mensagemData = $('#mensagem-data');

        // Adicione um manipulador de evento aos campos de data
        $vigenciaInicio.change(function() {
            verificarDatas();
        });

        $vigenciaFim.change(function() {
            verificarDatas();
        });

        // Função para verificar as datas e habilitar/desabilitar o checkbox
        function verificarDatas() {
            var dataInicio = new Date($vigenciaInicio.val());
            var dataFim = new Date($vigenciaFim.val());
            var hoje = new Date();

            if (dataInicio <= hoje && dataFim >= hoje) {
                $atual.prop('disabled', false);
                // $atual.prop('checked', true);
                $mensagemData.text('');
            } else {
                $atual.prop('disabled', true);
                $atual.prop('checked', false);
                $mensagemData.text('A vigência selecionada não inclui a data atual.');
            }
        }
        verificarDatas();
    });


    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("form-colegiado");

        form.addEventListener("submit", function(event) {
            const professores = document.querySelectorAll('input[name="professores[]"]:checked').length;
            const alunos = document.querySelectorAll('input[name="alunos[]"]:checked').length;
            const servidores = document.querySelectorAll('input[name="servidores[]"]:checked').length;

            if (professores !== 4) {
                alert("Por favor, selecione exatamente 4 professores.");
                event.preventDefault();
            }

            if (alunos < 1 || alunos > 4) {
                alert("Por favor, selecione de 1 a 4 alunos.");
                event.preventDefault();
            }

            if (servidores < 1 || servidores > 4) {
                alert("Por favor, selecione de 1 a 4 servidores.");
                event.preventDefault();
            }
        });
    });
</script>

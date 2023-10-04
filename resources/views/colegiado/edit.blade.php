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
    <div class="container">
        <form method="post" action="{{ route('colegiado.update', ['id' => $colegiado->id]) }}" enctype="multipart/form-data"
            id="form-colegiado">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <h5>Portaria PDF</h5>
                    <label for="arquivo">Arquivo</label>
                    <input type="file" name="arquivo" id="arquivo" class="form-control">
                </div>

                <div>
                    <label for="local">Número portaria*</label>
                    <input type="number" name="numero_portaria" id="numero_portaria" class="form-control"
                        value="{{ $colegiado->numero_portaria }}" required>
                    <label for="vigencia">Vigência*</label>
                    <input type="date" name="vigencia_inicio" id="vigencia_incio" class="form-control"
                        value="{{ date('Y-m-d', strtotime($colegiado->inicio)) }}" required> até
                    <input type="date" name="vigencia_fim" id="vigencia_fim" class="form-control"
                        value="{{ date('Y-m-d', strtotime($colegiado->fim)) }}" required>
                </div>
            </div>
            <div class="form-group">
                <h5>Professores </h5>

                <div class="form-group" id="professores">
                    <label for="professores">Selecione 4 professores: </label>

                    @foreach ($professores as $professor)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="professores[]"
                                id="professor_{{ $professor->id }}" value="{{ $professor->id }}"
                                {{ $colegiado->professores->contains($professor->id) ? 'checked' : '' }}>
                            <label for="professor_{{ $professor->id }}"
                                class="form-check-label">{{ $professor->servidor->nome }}</label>
                        </div>
                    @endforeach
                </div>
                <a href="" class="btn custom-button modal-trigger" data-bs-toggle="modal"
                    data-bs-target="#createProfessor">Cadastrar novo professor</a>

                <div class="form-group" id="alunos">
                    <h5>Alunos</h5>
                    <label for="">Selecione pelo menos 1 e no máximo 4 alunos: </label>

                    @foreach ($alunos as $aluno)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="alunos[]" id="aluno_{{ $aluno->id }}"
                                value="{{ $aluno->id }}"
                                {{ $colegiado->alunos->contains($aluno->id) ? 'checked' : '' }}>
                            <label for="aluno_{{ $aluno->id }}" class="form-check-label">{{ $aluno->nome }}</label>
                        </div>
                    @endforeach
                </div>
                <a href="" class="btn custom-button modal-trigger" data-bs-toggle="modal"
                    data-bs-target="#createAluno">Cadastrar aluno</a>

                <div class="form-group" id="servidores">
                    <h5>Servidor</h5>
                    <label for="">Selecione pelo menos 1 e no máximo 4 servidores para técnicos administrativos:
                    </label>

                    @foreach ($servidores as $servidor)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="servidores[]"
                                id="servidor_{{ $servidor->id }}" value="{{ $servidor->id }}"
                                {{ $colegiado->tecnicosAdm->contains($servidor->id) ? 'checked' : '' }}>
                            <label for="servidor_{{ $servidor->id }}"
                                class="form-check-label">{{ $servidor->nome }}</label>
                        </div>
                    @endforeach

                </div>
                <a href="" class="btn custom-button modal-trigger" data-bs-toggle="modal"
                    data-bs-target="#createServidor">Cadastrar servidor</a>
            </div>
            <button type="submit" class="btn custom-button custom-button-castastrar-tcc btn-default">Atualizar</button>
            <a href="{{ route('colegiado.index') }} "
                class="btn custom-button custom-button-castastrar-tcc btn-default">Cancelar</a>
        </form>
    </div>
    @include('modal.createProfessor')
    @include('modal.createAluno')
    @include('modal.createServidor')
@stop
<script>
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

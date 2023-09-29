@extends('layouts.main')

@section('title', 'Novo Colegiado')

@section('content')
<div class="custom-container">
    <div>
        <div>
            <i class="fas fa-chalkboard fa-2x"></i>
            <h3 class="smaller-font">Novo colegiado</h3>
        </div>
    </div>
</div>
<div class="container">
    <form method="post" action="{{ route('colegiado.store') }}">
        @csrf
        <div class="form-group">
            <div class="form-group">
                <h5>Portaria PDF</h5>
                <label for="arquivo">Arquivo</label>
                <input type="file" name="arquivo" id="arquivo" class="form-control" required>
            </div>

            <div>
                <label for="local">Número portaria*</label>
                <input type="number" name="numero_portaria" id="numero_portaria" class="form-control" required>
                <label for="vigencia">Vigência*</label>
                <input type="date" name="vigencia_inicio" id="vigencia_incio" class="form-control" value="{{ date('Y-m-d', strtotime($hoje)) }}" required> até
                <input type="date" name="vigencia_fim" id="vigencia_fim" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <h5>Professores </h5>

            <div class="form-group">
                <label for="professores">Selecione 4 professores: </label>

                @foreach ($professores as $professor)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="professores[]" id="professor_{{$professor->id}}" value="{{$professor->id}}">
                    <label for="professor_{{$professor->id}}" class="form-check-label">{{$professor->servidor->nome}} - {{ $professor->titulacao }} </label>
                </div>
                @endforeach
                <a href="" class="btn custom-button modal-trigger" data-bs-toggle="modal" data-bs-target="#createProfessor" >Cadastrar novo professor</a>
            </div>

            <div class="form-group">
                <h5>Alunos</h5>
                <label for="">Selecione pelo menos 1 e no máximo 4 alunos: </label>
                @foreach ($alunos as $aluno )
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="alunos[]" id="aluno_{{$aluno->id}}" value="{{$aluno->id}}">
                    <label for="aluno_{{$aluno->id}}" class="form-check-label">{{$aluno->nome}}</label>
                </div>
                @endforeach
                <a href="" class="btn custom-button modal-trigger" data-bs-toggle="modal" data-bs-target="#createAluno" >Cadastrar aluno</a>
            </div>

            <div class="form-group">
                <h5>Servidor</h5>
                <label for="">Selecione pelo menos 1 e no máximo 4 servidores: </label>
                @foreach ($servidores as $servidor )

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="servidores[]" id="servidor_{{$servidor->id}}" value="{{$servidor->id}}">
                    <label for="servidor_{{$servidor->id}}" class="form-check-label">{{$servidor->nome}}</label>
                </div>
                @endforeach
                <a href="" class="btn custom-button modal-trigger" data-bs-toggle="modal" data-bs-target="#createServidor" >Cadastrar servidor</a>
            </div>
        </div>
        <button type="submit" class="btn custom-button custom-button-castastrar-tcc btn-default">Cadastrar</button>
        <button class="btn custom-button custom-button-castastrar-tcc btn-default"><a href="{{ route('colegiado.index') }}" class="btn-back">Cancelar</a></button>

    </form>
</div>
@include('modal.createProfessor')
@include('modal.createAluno')
@stop

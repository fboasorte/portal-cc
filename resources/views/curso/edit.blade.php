@extends('layouts.main')

@section('title', 'Editar Curso')

@section('content')
    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-graduation-cap fa-2x"></i>
                <h3 class="smaller-font">Editar Curso</h3>
            </div>
        </div>
    </div>
    <div class="container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <form method="post" action="{{ route('curso.update', $curso->id) }}">
            @csrf
            @method('PUT') {{-- Usamos @method('PUT') para indicar que esta é uma atualização --}}

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="{{ $curso->nome }}" placeholder="Informe o nome do Curso" required>
            </div>
            <div class="form-group">
                <label for="turno">Turno:</label>
                <select id="turno" name="turno" required>
                    <option value="Matutino" @if($curso->turno == 'Matutino') selected @endif>Matutino</option>
                    <option value="Vespertino" @if($curso->turno == 'Vespertino') selected @endif>Vespertino</option>
                    <option value="Noturno" @if($curso->turno == 'Noturno') selected @endif>Noturno</option>
                    <option value="Integral" @if($curso->turno == 'Integral') selected @endif>Integral</option>
                </select>
            </div>
            <div class="form-group">
                <label for="carga_horaria">Carga Horária:</label>
                <input type="number" id="carga_horaria" name="carga_horaria" value="{{ $curso->carga_horaria }}" placeholder="Informe a carga horária">
            </div>
            <div class="form-group">
                <label for="sigla">Sigla:</label>
                <input type="text" id="sigla" name="sigla" value="{{ $curso->sigla }}" placeholder="Informe a sigla" maxlength="5">
            </div>
            <div class="form-group">
                <label for="analytics">Analytics:</label>
                <input type="text" id="analytics" name="analytics" value="{{ $curso->analytics }}" placeholder="Informe o analytics">
            </div>
            <button type="submit" class="btn custom-button btn-default">Atualizar</button>
            <a href="{{ route('curso.index') }}" class="btn custom-button custom-button-castastrar-tcc btn-default btn-back">Cancelar</a>
        </form>
    </div>
@stop

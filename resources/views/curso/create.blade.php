@extends('layouts.main')

@section('title', 'Criar Curso')

@section('content')

    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-graduation-cap fa-2x"></i>
                <h3 class="smaller-font">Gerenciar Curso</h3>
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

        <form method="post" action="{{ route('curso.store') }}">
            @csrf
            <div class="form-group">
                <label for="turno">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Informe o nome do Curso" required>
            </div>
            <div class="form-group">
                <label for="turno">Turno:</label>

                <select id="turno" name="turno" required>
                    <option value="Matutino">Matutino</option>
                    <option value="Vespertino">Vespertino</option>
                    <option value="Noturno">Noturno</option>
                    <option value="Integral">Integral</option>
                </select>
            </div>
            <div class="form-group">
                <label for="carga-horaria">Carga Horária:</label>
                <input type="Number" id="carga_horaria" name="carga_horaria" placeholder="Informe a carga horária">
            </div>
            <div class="form-group">
                <label for="sigla">Sigla:</label>
                <input type="text" id="sigla" name="sigla" placeholder="Informe a sigla"  maxlength="5">
            </div>
            <div class="form-group">
                <label for="analytics">Analytics:</label>
                <input type="text" id="analytics" name="analytics" placeholder="Informe o analytics">
            </div>
            <button type="submit" class="btn custom-button btn-default">Cadastrar</button>
            <button class="btn custom-button custom-button-castastrar-tcc btn-default"><a
                    href="{{ route('curso.index') }} "class="btn-back">Cancelar</a></button>
        </form>
    </div>
@stop

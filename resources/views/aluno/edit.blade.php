@extends('layouts.main')

@section('title', 'Editar aluno')

@section('content')
@include('layouts.sidebar',  ['title' => 'Editar Aluno','iconClass' => 'fas fa-graduation-cap'])

    <div class="container mt-4">
        <form method="post" action="{{ route('aluno.update', [$aluno->id]) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nome" class="form-label"> <br>Título*:</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Título do TCC"
                    value="{{ $aluno->nome }}" required>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn custom-button custom-button-castastrar-tcc btn-default">Atualizar</button>
                <button class="btn custom-button custom-button-castastrar-tcc btn-default"><a
                        href="{{ route('aluno.index') }}" class="btn-back">Cancelar</a></button>
            </div>
        </form>
    </div>

@endsection

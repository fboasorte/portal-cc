@extends('layouts.main')

@section('title', 'Editar aluno')

@section('content')
    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-graduation-cap fa-2x"></i>
                <h3 class="smaller-font">Editar Aluno</h3>
            </div>
        </div>
    </div>

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
                <button type="submit" class="btn custom-button custom-button-castastrar-tcc">Atualizar</button>
                <button class="btn custom-button custom-button-castastrar-tcc"><a
                        href="{{ route('aluno.index') }}">Cancelar</a></button>
            </div>
        </form>
    </div>

@endsection

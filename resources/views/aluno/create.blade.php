@extends('layouts.main')

@section('title', 'Cadastrar Aluno')

@section('content')
    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-graduation-cap fa-2x"></i>
                <h3 class="smaller-font">Cadastro do Aluno</h3>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <form method="post" action="{{ route('aluno.store') }}">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label"> <br>Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do aluno"
                    required>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn custom-button btn-default">Cadastrar</button>
                <button class="btn custom-button custom-button-castastrar-tcc btn-default"><a
                        href="{{ route('aluno.index') }}" class="btn-back">Cancelar</a></button>
            </div>
        </form>
    </div>
@endsection

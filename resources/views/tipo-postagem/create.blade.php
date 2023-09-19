@extends('layouts.main')

@section('title', 'Criar Tipo de Postagem')

@section('content')
    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-graduation-cap fa-2x"></i>
                <h3 class="smaller-font">Gerenciar Postagem</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <form method="post" action="{{ route('tipo-postagem.store') }}">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control"
                    placeholder="Nome do tipo de postagem" required>
            </div>
            <button type="submit" class="btn custom-button btn-default">Cadastrar</button>
            <button class="btn custom-button custom-button-castastrar-tcc btn-default"><a
                    href="{{ route('tipo-postagem.index') }} "class="btn-back">Cancelar</a></button>

        </form>
    </div>
@stop

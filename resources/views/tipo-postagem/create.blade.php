@extends('layouts.main')

@section('title', 'Criar Tipo de Postagem')

@section('content')

@include('layouts.sidebar',  ['title' => 'Gerenciar Tipo Postagem','iconClass' => 'fas fa-paste'])

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

@extends('layouts.main')

@section('title', 'Criar Professor Externo')

@section('content')
@include('layouts.sidebar',  ['title' => 'Gerenciar Professor Externo','iconClass' => 'fas fa-person-chalkboard'])

    <div class="container">
        <form method="post" action="{{ route('professor-externo.store') }}">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control"
                    placeholder="Nome do professor externo" required>
                <label for="filiacao">Filiação</label>
                <input type="text" name="filiacao" id="filiacao" class="form-control"
                    placeholder="Nome da instituição de filiação" required>
            </div>
            <button type="submit" class="btn custom-button btn-default">Cadastrar</button>
            <button class="btn custom-button custom-button-castastrar-tcc btn-default"><a
                    href="{{ route('professor-externo.index') }} "class="btn-back">Cancelar</a></button>
        </form>
    </div>
@stop

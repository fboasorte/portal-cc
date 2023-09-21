@extends('layouts.main')

@section('title', 'Editar Professor Externo')

@section('content')
@include('layouts.sidebar',  ['title' => 'Gerenciar Professor Externo','iconClass' => 'fas fa-person-chalkboard'])
    <div class="container">
        <form method="post" action="{{ route('professor-externo.update', ['id' => $professor_externo->id]) }}">
            @csrf
            @method('PUT')
            <label for="">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $professor_externo->nome }}">
            <label for="">Filiacao</label>
            <input type="text" name="filiacao" class="form-control" value="{{ $professor_externo->filiacao }}">
            <button type="submit" class="btn custom-button btn-default">Salvar</button>
            <button class="btn custom-button custom-button-castastrar-tcc btn-default"><a
                    href="{{ route('professor-externo.index') }} "class="btn-back">Cancelar</a></button>
        </form>
    </div>
@stop

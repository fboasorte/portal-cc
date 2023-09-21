@extends('layouts.main')

@section('title', 'Editar Tipo de Postagem')

@section('content')

@include('layouts.sidebar',  ['title' => 'Editar Tipo Postagem','iconClass' => 'fas fa-paste'])

    <div class="container">
        <form method="post" action="{{ route('tipo-postagem.update', ['id' => $tipo_postagem->id]) }}">
            @csrf
            @method('PUT')
            <label for="">Nome</label> <br>
            <input type="text" name="nome" value="{{ $tipo_postagem->nome }}">
            <button type="submit" class="btn custom-button btn-default">Salvar</button>
            <button class="btn custom-button custom-button-castastrar-tcc btn-default"><a
                    href="{{ route('postagem.index') }} "class="btn-back">Cancelar</a></button>
        </form>
    </div>
@stop

@extends('layouts.tipo-postagem')

@section('title', 'Editar Tipo de Postagem')

@section('content')
<form method="post" action="{{ route('update_tipo_postagem', ['id' => $tipo_postagem->id]) }}">
    @csrf
    <label for="">Nome</label> <br>
    <input type="text" name="nome" value="{{ $tipo_postagem->nome }}">
    <button>Salvar</button>
</form>
@stop
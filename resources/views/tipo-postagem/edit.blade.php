@extends('layouts.tipo-postagem')

@section('title', 'Editar Tipo de Postagem')

@section('content')
<form method="post" action="{{ route('tipo-postagem.update', ['id' => $tipo_postagem->id]) }}">
    @csrf
    @method('PUT')
    <label for="">Nome</label> <br>
    <input type="text" name="nome" value="{{ $tipo_postagem->nome }}">
    <button>Salvar</button>
</form>
@stop
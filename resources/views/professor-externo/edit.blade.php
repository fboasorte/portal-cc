@extends('layouts.professor-externo')

@section('title', 'Editar Professor Externo')

@section('content')
<form method="post" action="{{ route('professor-externo.update', ['id' => $professor_externo->id]) }}">
    @csrf
    @method('PUT')
    <label for="">Nome</label>
    <input type="text" name="nome" class="form-control" value="{{ $professor_externo->nome }}">
    <label for="">Filiacao</label>
    <input type="text" name="filiacao" class="form-control" value="{{ $professor_externo->filiacao }}">
    <button class="btn btn-primary">Salvar</button>
    <a href="{{ route('professor-externo.index') }}">Cancelar</a>
</form>
@stop

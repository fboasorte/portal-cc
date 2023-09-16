@extends('layouts.professor-externo')

@section('title', 'Criar Professor Externo')

@section('content')
<form method="post" action="{{ route('professor-externo.store') }}">
    @csrf
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do professor externo" required>
        <label for="filiacao">Filiação</label>
        <input type="text" name="filiacao" id="filiacao" class="form-control" placeholder="Nome da instituição de filiação" required>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="{{ route('professor-externo.index') }}">Cancelar</a>
</form>
@stop

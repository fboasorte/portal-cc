@extends('layouts.projeto')

@section('title', 'Editar Projeto')

@section('content')
    <form method="post" action="{{ route('projeto.update', ['id' => $projeto->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" placeholder="Descrição do projeto" required>{{ $projeto->descricao }}</textarea>
        </div>

        <div class="form-group">
            <label for="titulo">Data de Início</label>
            <input value="{{ $projeto->data_inicio }}" type="date" name="data_inicio" id="data_inicio" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="titulo">Data de Termino</label>
            <input value="{{ $projeto->data_termino }}" type="date" name="data_termino" id="data_termino" class="form-control">
        </div>

        <div class="form-group">
            <label for="titulo">Resultados</label>
            <input value="{{ $projeto->resultados }}" type="text" name="resultados" id="resultados" class="form-control"
                placeholder="Resultados do projeto">
        </div>

        <div class="form-group">
            <label for="titulo">Palavras Chave</label>
            <input value="{{ $projeto->palavras_chave }}" type="text" name="palavras_chave" id="palavras_chave" class="form-control"
                placeholder="Palavras Chave" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>

    </form>

@stop

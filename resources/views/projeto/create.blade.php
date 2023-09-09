@extends('layouts.projeto')

@section('title', 'Criar Projeto')

@section('content')
    <form method="post" action="{{ route('projeto.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="titulo">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" placeholder="Descrição do projeto" required></textarea>
        </div>

        <div class="form-group">
            <label for="titulo">Data de Início</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="titulo">Data de Termino</label>
            <input type="date" name="data_termino" id="data_termino" class="form-control">
        </div>

        <div class="form-group">
            <label for="titulo">Resultados</label>
            <input type="text" name="resultados" id="resultados" class="form-control" placeholder="Resultados do projeto">
        </div>

        <div class="form-group">
            <label for="titulo">Palavras Chave</label>
            <input type="text" name="palavras_chave" id="palavras_chave" class="form-control" placeholder="Palavras Chave" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>

    </form>
@stop

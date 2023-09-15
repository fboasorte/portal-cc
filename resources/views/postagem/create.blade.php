@extends('layouts.postagem')

@section('title', 'Criar Postagem')

@section('content')
    <form method="post" action="{{ route('postagem.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título da postagem" required>
        </div>
        <div class="form-group">
            <label for="texto">Texto</label>
            <textarea name="texto" id="texto" class="form-control" placeholder="Texto da postagem" required></textarea>
        </div>
        <div class="form-group">
            <label for="tipo_postagem">Tipo</label>
            <select name="tipo_postagem_id" id="tipo_postagem_id" class="form-control" required>
                @foreach ($tipo_postagens as $key => $value)
                    <option value="{{ $key }}" {{ $key == $id ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="imagens">Imagens</label>
            <input type="file" name="imagens[]" id="imagens" class="form-control" multiple>
        </div>
        <div class="form-group">
            <label for="arquivos">Arquivos</label>
            <input type="file" name="arquivos[]" id="arquivos" class="form-control" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>

    </form>
@stop

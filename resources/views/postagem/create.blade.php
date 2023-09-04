@extends('layouts.postagem')

@section('title', 'Criar Postagem')

@section('content')
    <form method="post" action="{{ route('store_postagem') }}">
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
            <label for="imagem">Imagem</label>
            <input type="file" name="imagem" id="imagem" class="form-control">
        </div>
        <div class="form-group">
            <label for="arquivo">Arquivo</label>
            <input type="file" name="arquivo" id="arquivo" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>

    </form>
@stop

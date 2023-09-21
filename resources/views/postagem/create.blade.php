@extends('layouts.main')

@section('title', 'Criar Postagem')

@section('content')

    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-graduation-cap fa-2x"></i>
                <h3 class="smaller-font">Gerenciar Projeto</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <form method="post" action="{{ route('postagem.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">Título</label>
                <input value="{{ $postagem['titulo'] }}" type="text" name="titulo" id="titulo" class="form-control"
                    placeholder="Título da postagem" required>
            </div>
            <div class="form-group">
                <label for="texto">Texto</label>
                <textarea name="texto" id="texto" class="form-control" placeholder="Texto da postagem" required>{{ $postagem['texto'] }}</textarea>
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
                <label for="tipo_postagem">Exibe no menu inicial?</label>
                <input type="checkbox" name="menu_inicial" id="menu_inicial">
            </div>
            <div class="form-group">
                <label for="imagens">Imagens</label>
                <input type="file" name="imagens[]" id="imagens" class="form-control" multiple>
            </div>
            <div class="form-group">
                <label for="arquivos">Arquivos</label>
                <input type="file" name="arquivos[]" id="arquivos" class="form-control" multiple>
            </div>
            <button type="submit" class="btn custom-button btn-default">Cadastrar</button>
            <button class="btn custom-button custom-button-castastrar-tcc btn-default"><a
                    href="{{ route('postagem.index') }} "class="btn-back">Cancelar</a></button>
        </form>
    </div>
@stop

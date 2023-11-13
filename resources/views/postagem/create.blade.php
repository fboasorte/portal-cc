@extends('layouts.main')

@section('title', 'Criar Postagem')

@section('content')

    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-pen-to-square fa-2x"></i>
                <h3 class="smaller-font" class="form-label">Criar Postagem</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <form method="post" action="{{ route('postagem.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="titulo" class="form-label"><br>Título*:</label>
                <input value="{{ isset($postagem) ? $postagem['titulo'] : '' }}" type="text" name="titulo"
                    id="titulo" class="form-control" placeholder="Título da postagem" required>
            </div>

            <div class="form-group">
                <label for="texto" class="form-label">Texto*:</label>
                <textarea name="texto" id="texto" class="form-control" placeholder="Texto da postagem" required>{{ isset($postagem) ? $postagem['texto'] : '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="tipo_postagem" class="form-label">Tipo*:</label>
                <select name="tipo_postagem_id" id="tipo_postagem_id" class="form-control" required>
                    @foreach ($tipo_postagens as $key => $value)
                        <option value="{{ $key }}" {{ $key == $id ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tipo_postagem" class="form-label">Exibir no menu inicial?</label>
                <input type="checkbox" name="menu_inicial" id="menu_inicial">
            </div>

            <div class="form-group">
                <label for="imagens" class="form-label">Imagens (2700 x 660):</label>
                <input type="file" name="imagens[]" id="imagens" class="form-control" multiple>
            </div>

            <div class="form-group">
                <label for="arquivos" class="form-label">Arquivos:</label>
                <input type="file" name="arquivos[]" id="arquivos" class="form-control" multiple>
            </div>

            <button type="submit" class="btn custom-button btn-default">Cadastrar</button>
            <a href="{{ route('postagem.index') }} "
                class="btn custom-button custom-button-castastrar-tcc btn-default">Cancelar</a>
        </form>
    </div>
@stop

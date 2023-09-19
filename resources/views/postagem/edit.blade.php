@extends('layouts.main')

@section('title', 'Editar Postagem')

@section('content')
<div class="custom-container">
    <div>
        <div>
            <i class="fas fa-paste fa-2x"></i>
            <h3 class="smaller-font">Gerenciar Postagem</h3>
        </div>
    </div>
</div>
<div class="container">
    <form method="post" action="{{ route('postagem.update', ['id' => $postagem->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" value="{{ $postagem->titulo }}" name="titulo" id="titulo" class="form-control"
                placeholder="Título da postagem" required>
        </div>
        <div class="form-group">
            <label for="texto">Texto</label>
            <textarea name="texto" id="texto" class="form-control" placeholder="Texto da postagem" required>{{ $postagem->texto }}</textarea>
        </div>
        <div class="form-group">
            <label for="tipo_postagem">Tipo</label>
            <select name="tipo_postagem_id" id="tipo_postagem_id" class="form-control" required>
                @foreach ($tipo_postagens as $key => $value)
                    <option value="{{ $key }}" {{ $key == $postagem->tipo_postagem_id ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tipo_postagem">Exibe no menu inicial?</label>
            <input type="checkbox" name="menu_inicial" id="menu_inicial" {{$postagem->menu_inicial ? 'checked' : ''}}>
        </div>
        <div class="form-group">
            <label for="imagem">Imagem</label>
            @if (count($postagem->imagens) > 0)
                @foreach ($postagem->imagens as $img)
                    <button class="btn text-danger" type="submit" form="deletar-imagens{{ $img->id }}">X</button>
                    <img src="{{ URL::asset('storage') }}/{{ $img->imagem }}" class="img-responsive"
                        style="max-height:100px; max-width:100px;">
                @endforeach
            @endif
            <input type="file" name="imagens[]" id="imagens" class="form-control" multiple>
        </div>

        <div class="form-group">
            <label for="arquivo">Arquivo</label>
            @if (count($postagem->arquivos) > 0)
                @foreach ($postagem->arquivos as $arquivo)
                    <button class="btn text-danger" type="submit" form="deletar-arquivos{{ $arquivo->id }}">X</button>
                    <a href="{{ URL::asset('storage') }}/{{ $arquivo->path }}">{{ $arquivo->nome }}</a>
                @endforeach
            @endif
            <input type="file" name="arquivos[]" id="arquivos" class="form-control" multiple>
        </div>

        <button type="submit" class="btn custom-button btn-default">Salvar</button>
        <button class="btn custom-button custom-button-castastrar-tcc btn-default"><a href="{{route('postagem.index')}} "class= "btn-back" >Cancelar</a></button>
    </form>

    @if (count($postagem->imagens) > 0)
        @foreach ($postagem->imagens as $img)
            <form id="deletar-imagens{{ $img->id }}"
                action="{{ route('postagem.delete_imagem', ['id' => $img->id]) }}" method="post">
                @csrf
                @method('delete')
            </form>
        @endforeach
    @endif

    @if (count($postagem->arquivos) > 0)
        @foreach ($postagem->arquivos as $arquivo)
            <form id="deletar-arquivos{{ $arquivo->id }}"
                action="{{ route('postagem.delete_arquivo', ['id' => $arquivo->id]) }}" method="post">
                @csrf
                @method('delete')
            </form>
        @endforeach
    @endif
</div>
@stop

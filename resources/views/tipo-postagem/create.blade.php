@extends('layouts.tipo-postagem')

@section('title', 'Criar Tipo de Postagem')

@section('content')
<form method="post" action="{{ route('store_tipo_postagem') }}">
    @csrf
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do tipo de postagem" required>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>

</form>
@stop
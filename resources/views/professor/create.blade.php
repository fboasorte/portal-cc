@extends('layouts.main')

@section('title', 'Cadastrar Professor')

@section('content')
@include('layouts.sidebar',  ['title' => 'Gerenciar Professor','iconClass' => 'fas fa-person-chalkboard'])
    
    <div class="container">
        <form method="post" action="{{ route('professor.store') }}">
            @csrf
            <div class="mb-3">
                <label class="mt-5" for="nome">Nome</label>
                <input class="form-control" id="nome" name="nome" type="text" required>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input class="form-control" id="email" name="email" type="email" required>
            </div>
            <div class="mb-3">
                <label class="mt-5" for="login">Login</label>
                <input class="form-control" id="login" name="login" type="text" required>
            </div>
            <button type="submit" class="btn custom-button btn-default">Cadastrar</button>
            <button class="btn custom-button custom-button-castastrar-tcc btn-default"><a
                    href="{{ route('postagem.index') }} "class="btn-back">Cancelar</a></button>
        </form>
    </div>
@stop

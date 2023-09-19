@extends('layouts.main')

@section('title', 'Cadastrar Professor')

@section('content')
    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-person-chalkboard fa-2x"></i>
                <h3 class="smaller-font">Gerenciar Professor</h3>
            </div>
        </div>
    </div>
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

@extends('layouts.professor')

@section('title', 'Editar Professor')

@section('content')
@include('layouts.sidebar',  ['title' => 'Gerenciar Professor','iconClass' => 'fas fa-person-chalkboard'])

<div class="container">
    <form method="post" action="{{ route('professor.update',['id' => $servidor->id]) }}">
        @csrf
        @method('PUT')
        <form method="post">
            <div class="mb-3">
                <label class="mt-5" for="nome">Nome</label>
                <input value="{{ $servidor->nome}}" class="form-control" id="nome" name="nome" type="text" required>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input value="{{ $servidor->email}}" class="form-control" id="email" name="email" type="email" required>
            </div>
            <div class="mb-3">
                <label class="mt-5" for="login">Login</label>
                <input value="{{ $usuario->login}}" class="form-control" id="login" name="login" type="text" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Atualizar</button>
            <!-- <a href="{{ URL::previous() }}" class="btn btn-primary">Voltar</a> -->
            <a href="{{ route('professor.index') }}" class="btn btn-primary">Voltar</a>

        </form>
    </form>
</div>
@stop

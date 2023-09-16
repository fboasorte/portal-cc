@extends('layouts.professor')

@section('title', 'Cadastrar Professor')

@section('content')
    <form method="post" action="{{ route('store_professor') }}">
        @csrf
        <form method="post">
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
            <button type="submit" class="btn btn-primary mt-2">Cadastrar</button>
        </form>
    </form>
@stop

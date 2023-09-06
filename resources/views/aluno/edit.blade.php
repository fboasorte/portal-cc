@extends('layouts.alunoLayout')

@section('title', 'Editar aluno')

@section('content')
    <form method="post" action="{{ route('update_aluno', [$aluno->id]) }}">
        @csrf
        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" value="{{ $aluno->nome }}">
        <button>Salvar</button>
    </form>

@endsection

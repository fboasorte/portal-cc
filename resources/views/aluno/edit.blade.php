@extends('layouts.aluno')

@section('title', 'Editar aluno')

@section('content')
    <form method="post" action="{{ route('aluno.update', ['id' => $aluno->id]) }}">
        @csrf
        @method('PUT')
        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" value="{{ $aluno->nome }}">
        <button>Salvar</button>
        <a href="{{route('aluno.index')}}">Cancelar</a>
    </form>

@endsection

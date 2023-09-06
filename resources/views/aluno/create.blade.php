@extends('layouts.alunoLayout')

@section('title', 'Cadastrar novo aluno')

@section('content')
<form method="post" action="{{ route('store_aluno') }}">
    @csrf
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do aluno" required>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>

</form>
@endsection

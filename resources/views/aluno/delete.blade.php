@extends('layouts.alunoLayout')

@section('title', 'Confirmar exclusão')

@section('content')
    <h3>Deseja realamente excluir {{ $aluno->nome }} do sistema?</h3>
    <form method="post" action="{{ route('delete_aluno', $aluno->id) }}">
        @csrf
        <button type="submit" name="submit" value="1" class="btn btn-primary btn-sm">Sim</button>
        <button type="submit" name="submit" value="0" class="btn btn-danger btn-sm">Não</button>
    </form>
@endsection

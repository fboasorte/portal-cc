@extends('layouts.tccLayout')

@section('Title', 'Confirmação de exclusão')

@section('content')
    <h3>Deseja realamente excluir o TCC do sistema?</h3>
    <form method="post" action="{{ route('delete_tcc', $tcc->id) }}">
        @csrf
        <button type="submit" name="submit" value="1" class="btn btn-primary btn-sm">Sim</button>
        <button type="submit" name="submit" value="0" class="btn btn-danger btn-sm">Não</button>
    </form>

@endsection

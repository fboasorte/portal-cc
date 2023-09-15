@extends('layouts.menu')
@section('title', 'Confirmação de Exclusão')
@section('content')

<div class="container container-excluir">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Deseja realmente excluir o TCC do sistema?</h3>
                    <form method="post" action="{{ route('delete_tcc', $tcc->id) }}">
                        @csrf
                        <div class="text-center">
                            <button type="submit" name="submit" value="1" class="btn btn-danger">Sim</button>
                            <button type="submit" name="submit" value="0" class="btn btn-primary">Não</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
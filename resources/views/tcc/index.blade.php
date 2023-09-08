@extends('layouts.tccLayout')

@section('title', 'TCC')

@section('content')

<h1>Gerenciar TCC</h1>
    <div class="row">
        <div class="col-md-12">
            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="text" name="" class="search-control" placeholder="Buscar título de TCC" aria-label="Buscar" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                </div>
            </form>
        </div>
        <div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        TCC
                        <a href="{{ route('create_tcc') }}" class="btn btn-success btn-sm float-end">Cadastrar</a>
                    </div>
                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Título (id)</th>
                                    <th>Resumo</th>
                                    <th>Aluno (id)</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tccs as $tcc)
                                <tr>
                                    <td>{{ $tcc->titulo }} ({{ $tcc->id }})</td>
                                    <td>{{ $tcc->resumo }}</td>
                                    <td>{{ $tcc->nome }} ({{ $tcc->aluno_id }})</td>
                                    <td>
                                        <a href="{{ route('edit_tcc', [$tcc->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                                        <a href="" class="btn btn-danger btn-sm">Excluir</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

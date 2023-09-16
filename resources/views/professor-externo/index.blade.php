@extends('layouts.professor-externo')

@section('title', 'Professor Externo')

@section('content')
    <h1>Gerenciar Professor Externo</h1>
    <div class="row">
        <div class="col-md-12">
            <form action="" method="get">
                <div class="input-group mb-3">
                    <form action="" method="get">
                        <input value="{{ $buscar ? $buscar : '' }}" name="buscar" type="text" class="search-control"
                            placeholder="Buscar" aria-label="Buscar" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                    </form>
                </div>
            </form>
        </div>
        <div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        Professor Externo
                        <a href="{{ route('professor-externo.create') }}" class="btn btn-success btn-sm float-end">Cadastrar</a>
                    </div>
                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Filiação</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($professores_externos as $professor)
                                    <tr>
                                        <td>{{ $professor->id }}</td>
                                        <td>{{ $professor->nome }}</td>
                                        <td>{{ $professor->filiacao }}</td>
                                        <td>
                                            <form method="POST"
                                                action="{{ route('professor-externo.destroy', $professor->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <a href="{{ route('professor-externo.edit', $professor->id) }}"
                                                    class="btn btn-primary btn-sm">Editar</a>
                                                <button type="submit" class="btn btn-danger btn-sm" title='Delete'
                                                    onclick="return confirm('Deseja realmente excluir esse registro?')">Excluir</button>
                                            </form>
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
@stop

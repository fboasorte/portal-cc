@extends('layouts.tipo-postagem')

@section('title', 'Tipos de Postagem')

@section('content')
    <h1>Gerenciar Tipo Postagem</h1>
    <div class="row">
        <div class="col-md-12">
            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="search-control" placeholder="Buscar Tipo" aria-label="Buscar"
                        aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                </div>
            </form>
        </div>
        <div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        Tipos de Postagens
                        <a href="{{ route('create_tipo_postagem') }}" class="btn btn-success btn-sm float-end">Cadastrar</a>
                    </div>
                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipo_postagens as $tipo_postagem)
                                    <tr>
                                        <td>{{ $tipo_postagem->id }}</td>
                                        <td>{{ $tipo_postagem->nome }}</td>
                                        <td>
                                            <form method="POST"
                                                action="{{ route('destroy_tipo_postagem', $tipo_postagem->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <a href="{{ route('edit_tipo_postagem', $tipo_postagem->id) }}"
                                                    class="btn btn-primary btn-sm">Editar</a>
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    title='Delete'
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

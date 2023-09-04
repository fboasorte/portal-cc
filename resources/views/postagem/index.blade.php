@extends('layouts.postagem')

@section('title', 'Postagens')

@section('content')
    <h1>Gerenciar Postagem</h1>
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
                        Postagens
                        <a href="{{ route('create_postagem') }}" class="btn btn-success btn-sm float-end">Cadastrar</a>
                    </div>
                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Criação</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($postagens as $postagem)
                                    <tr>
                                        <td>{{ $postagem->id }}</td>
                                        <td>{{ $postagem->titulo }}</td>
                                        <td>{{ date_format($postagem->created_at, 'd/m/Y H:i:s') }}</td>
                                        <td>
                                            <a href="{{ route('edit_postagem', $postagem->id) }}"
                                                class="btn btn-primary btn-sm">Editar</a>
                                            <a href="#" class="btn btn-danger btn-sm">Excluir</a>
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

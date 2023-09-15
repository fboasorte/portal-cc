@extends('layouts.professor')

@section('title', 'Professores')

@section('content')
    <h1>Gerenciar Professores</h1>
    <div class="row">
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
                        Professores
                        <a href="{{ route('create_professor') }}" class="btn btn-success btn-sm float-end">Cadastrar</a>
                    </div>
                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Criação</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($servidores as $servidor)
                                    <tr>
                                        <td>{{ $servidor->id }}</td>
                                        <td>{{ $servidor->nome }}</td>
                                        <td>{{ $servidor->email }}</td>
                                        <td>{{ date_format($servidor->created_at, 'd/m/Y H:i:s') }}</td>
                                        <td>
                                            <a class="btn btn-success btn-sm" href="{{ route('view_professor', $servidor->id) }}">Visualizar</a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('edit_professor', $servidor->id) }}">Editar</a>
                                            
                                            <a href="{{ route('delete_professor', $servidor->id) }}"><button type="submit" class="btn btn-danger btn-sm" title='Delete'
                                                onclick="return confirm('Deseja realmente excluir esse registro?')">Excluir</button></a>
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

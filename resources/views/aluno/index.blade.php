@extends('layouts.alunoLayout')

@section('title', 'Alunos')

@section('content')

<h1>Gerenciar Alunos</h1>
    <div class="row">
        <div class="col-md-12">
            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="search-control" placeholder="Buscar Tipo" aria-label="Buscar" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                </div>
            </form>
        </div>
        <div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        Alunos
                        <a href="{{ route('create_aluno') }}" class="btn btn-success btn-sm float-end">Cadastrar</a>
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
                                @foreach($alunos as $aluno)

                                <tr>
                                    <td>{{ $aluno->id }}</td>
                                    <td>{{ $aluno->nome }}</td>
                                    <td>
                                        <a href="{{ route('edit_aluno', $aluno->id) }}" class="btn btn-primary btn-sm">Editar</a>
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

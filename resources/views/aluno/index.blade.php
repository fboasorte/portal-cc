@extends('layouts.main')

@section('title', 'Alunos')

@section('content')

    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-graduation-cap fa-2x"></i>
                <h3 class="smaller-font">Gerenciar Aluno</h3>
            </div>
        </div>
    </div>

    <div class="container">

        <br>
        <div class="row campo-busca">
            <div class="col-md-12">
                <input type="text" id="searchInput" class="form-control" placeholder="Buscar em todos os campos"
                    aria-label="Buscar">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white div-aluno">
                        Aluno
                        <a href="{{ route('aluno.create') }}" class="btn btn-success btn-sm float-end">Cadastrar</a>
                    </div>
                    <div class="card-body">

                        <table id="alunoTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alunos as $aluno)
                                    <tr>
                                        <td>{{ $aluno->id }}</td>
                                        <td>{{ $aluno->nome }}</td>
                                        <td class="text-center">
                                            <form method="POST" action="{{ route('aluno.destroy', $aluno->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <a href="{{ route('aluno.edit', $aluno->id) }}"
                                                    class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                <button type="submit" class="btn btn-danger btn-sm" title='Delete'
                                                    onclick="return confirm('Deseja realmente excluir esse registro?')"><i
                                                        class="fas fa-trash"></i></button>
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
@endsection

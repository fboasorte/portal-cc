@extends('layouts.main')

@section('title', 'Alunos')

@section('content')
    <div class="custom-container">
        <div>
            <div>
                <span class="post material-symbols-outlined " style = "font-size:190%;">face</span>
                <h3 class="smaller-font">Gerenciar Alunos</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row campo-busca">
            <div class="col-md-12">
                <input type="text" id="searchInput" class="form-control field-search" placeholder="Buscar em todos os campos"
                    aria-label="Buscar">
            </div>
        </div>
        <div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white div-form">
                        Alunos
                        <a href="{{ route('professor.create') }}" class="btn btn-success btn-sm float-end">Cadastrar</a>
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

                                    <tr>
                                        <td>1</td>
                                        <td>Maria</td>
                                        <td>
                                            <form method="get" action="/">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <a class="btn btn-success btn-sm"
                                                    href="#">Visualizar</a>
                                                <a class="btn btn-primary btn-sm"
                                                    href="#">Editar</a>
                                                <button type="submit" class="btn btn-danger btn-sm" title='Delete'
                                                    onclick="return confirm('Deseja realmente excluir esse registro?')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop

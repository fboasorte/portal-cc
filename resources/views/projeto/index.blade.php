@extends('layouts.main')

@section('title', 'Projetos')

@section('content')
    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-envelopes-bulk fa-2x"></i>
                <h3 class="smaller-font">Gerenciar Postagem</h3>
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
                        Tipos de Postagens
                        <a href="{{ route('projeto.create') }}" class="btn btn-success btn-sm float-end">Cadastrar</a>
                    </div>
                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Descrição</th>
                                    <th>Data Inicio</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projetos as $projeto)
                                    <tr>
                                        <td>{{ $projeto->id }}</td>
                                        <td>{{ $projeto->descricao }}</td>
                                        <td>{{ date('d/m/Y', strtotime($projeto->data_inicio)) }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('projeto.destroy', $projeto->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <a href="{{ route('projeto.edit', $projeto->id) }}"
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
@stop

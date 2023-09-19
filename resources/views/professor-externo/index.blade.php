@extends('layouts.main')

@section('title', 'Professor Externo')

@section('content')
    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-person-chalkboard fa-2x"></i>
                <h3 class="smaller-font">Gerenciar Professor</h3>
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
                        Professor Externo
                        <a href="{{ route('professor-externo.create') }}"
                            class="btn btn-success btn-sm float-end">Cadastrar</a>
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

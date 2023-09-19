@extends('layouts.main')

@section('title', 'Tipos de Postagem')

@section('content')
    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-paste fa-2x"></i>
                <h3 class="smaller-font">Gerenciar Tipo de Postagem</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="container">
            <div class="row campo-busca">
                <div class="col-md-12">
                    <input type="text" id="searchInput" class="form-control field-search"
                        placeholder="Buscar em todos os campos" aria-label="Buscar">
                </div>
            </div>
            <div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-white div-form">
                            Tipos de Postagens
                            <a href="{{ route('tipo-postagem.create') }}"
                                class="btn btn-success btn-sm float-end">Cadastrar</a>
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
                                                    action="{{ route('tipo-postagem.destroy', $tipo_postagem->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <a href="{{ route('tipo-postagem.edit', $tipo_postagem->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
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
    </div>
@stop

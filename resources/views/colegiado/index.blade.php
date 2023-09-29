@extends('layouts.main')

@section('title', 'Colegiado')

@section('content')
    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-paste fa-2x"></i>
                <h3 class="smaller-font">Colegiado</h3>
            </div>
        </div>
    </div>

    <div class="container">
        <div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-white div-form">
                            Colegiado
                            <a href=" {{ route('colegiado.create') }} " class="btn btn-success btn-sm float-end">Novo</a>
                            <div>
                                <label for="portaria">Portaria</label>
                                <p></p>
                            </div>
                            <div>
                                <label for="vigencia">Vigência</label>
                            </div>
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
                                        <tr>
                                            <td> </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <form method="POST"
                                                    action="">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <a href=""
                                                        class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
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

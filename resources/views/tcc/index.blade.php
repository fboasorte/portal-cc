@extends('layouts.menu')
@section('title', 'TCC')
@section('content')

<div class="custom-container">
    <div>
        <div>
            <i class="fas fa-graduation-cap fa-2x"></i>
            <h3 class="smaller-font">Gerenciar TCC</h3>
        </div>
    </div>
</div>

<div class="container">

    <br>
    <div class="row campo-busca">
        <div class="col-md-12">
            <input type="text" id="searchInput" class="form-control" placeholder="Buscar em todos os campos" aria-label="Buscar">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white div-tcc">
                    TCC
                    <a href="{{ route('create_tcc') }}" class="btn btn-success btn-sm float-end">Cadastrar</a>
                </div>
                <div class="card-body">

                    <table id="tccTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Título (id)</th>
                                <th class="text-center">Resumo</th>
                                <th class="text-center">Aluno (id)</th>
                                <th class="text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tccs as $tcc)
                            <tr>
                                <td>{{ $tcc->titulo }} ({{ $tcc->id }})</td>
                                <td>{{ $tcc->resumo }}</td>
                                <td>{{ $tcc->nome }} ({{ $tcc->aluno_id }})</td>
                                <td class="text-center"> 
                                    <a href="{{ route('edit_tcc', [$tcc->id]) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="{{ route('delete_view', [$tcc->id]) }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#searchInput").on("keyup", function() {
        var searchText = $(this).val().toLowerCase();
        $("#tccTable tbody tr").filter(function() {
            // Excluindo a última coluna que é a de ação do filtro
            var rowData = $(this).find("td:not(:last-child)").text().toLowerCase();
            $(this).toggle(rowData.indexOf(searchText) > -1);
        });
    });
});
</script>

@endsection

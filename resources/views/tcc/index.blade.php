@extends('layouts.main')
@section('title', 'TCC')
@section('content')


@include('layouts.sidebar',  ['title' => 'Cadastro do TCC','iconClass' => 'fas fa-graduation-cap'])

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
                <div class="card-header text-white div-form">
                    TCC
                    <a href="{{ route('tcc.create') }}" class="btn btn-success btn-sm float-end">Cadastrar</a>
                </div>
                <div class="card-body">

                    <table id="tccTable" class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center">Título (id)</th>
                                <th class="text-center">Resumo</th>
                                <th class="text-center">Aluno (id)</th>
                                <th class="text-center">Orientador </th>
                                <th class="text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tccs as $tcc)
                            <tr>
                                <td>{{ $tcc->titulo }} ({{ $tcc->id }})</td>
                                <td>{{ $tcc->resumo }}</td>
                                <td>{{ $tcc->nome }} ({{ $tcc->aluno_id }})</td>
                                <td> {{ $professores->contains($tcc->professor_id) ? $professores->where('id', $tcc->professor_id)->first()->nome : ''}} </td>
                                <td class="text-center">
                                    <form method="POST"
                                        action="{{ route('tcc.destroy', $tcc->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <a href="{{ route('tcc.edit', $tcc->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <button type="submit" class="btn btn-danger btn-sm" title='Delete'
                                            onclick="return confirm('Deseja realmente excluir esse registro?')"><i class="fas fa-trash"></i></button>
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

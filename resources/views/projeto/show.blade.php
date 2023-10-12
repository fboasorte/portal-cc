@extends('layouts.main')
@section('title', 'Projetos')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
@php
    $meses = [
        1 => 'Janeiro',
        2 => 'Fevereiro',
        3 => 'Março',
        4 => 'Abril',
        5 => 'Maio',
        6 => 'Junho',
        7 => 'Julho',
        8 => 'Agosto',
        9 => 'Setembro',
        10 => 'Outubro',
        11 => 'Novembro',
        12 => 'Dezembro',
    ];
@endphp
<div class="custom-container">
    <div>
        <div>
            <i class="fas fa-graduation-cap fa-2x"></i>
            <h3 class="smaller-font">Projetos</h3>
        </div>
    </div>
</div>
<br>
<div class="event-schedule-area-two bg-color pad100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                        <div class="table-responsive">
                            <table id="projetoTable" class="table custom-table table-hover">
                                <thead class="custom-table-head">
                                    <tr>
                                        <th class="text-center" scope="col">Data de Inicio</th>
                                        <th class="text-center" scope="col">Data de Encerramento</th>
                                        <th class="text-center" scope="col">Descrição</th>
                                        <th class="text-center" scope="col">Professor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projetos as $projeto)
                                    <tr class="inner-box clickable-row linha" data-href="{{ route('projeto.view', ['id' => $projeto->id]) }}">
                                        <th scope="row">
                                            <div class="event-date">
                                                <span class="date-day">{{ \Carbon\Carbon::parse($projeto->data_inicio)->format('d') }}</span><br>
                                                <span class="date-month">{{ $meses[\Carbon\Carbon::parse($projeto->data_inicio)->month] }}</span><br>
                                                <span class="date-year">{{ \Carbon\Carbon::parse($projeto->data_inicio)->format('Y') }}</span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="event-date">
                                                <span class="date-day">{{ \Carbon\Carbon::parse($projeto->data_termino)->format('d') }}</span><br>
                                                <span class="date-month">{{ $meses[\Carbon\Carbon::parse($projeto->data_termino)->month] }}</span><br>
                                                <span class="date-year">{{ \Carbon\Carbon::parse($projeto->data_termino)->format('Y') }}</span>
                                            </div>
                                        </th>
                                        <td>
                                            <div class="event-student text-center">
                                                <span>{{ $projeto->descricao}}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="event-orientador text-center">
                                                <span>{{ $projeto->nome_professor }}</span>
                                            </div>
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
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var rows = document.querySelectorAll(".clickable-row");

        rows.forEach(function(row) {
            row.addEventListener("click", function() {
                window.location.href = row.getAttribute("data-href");
            });
        });

        $('#projetoTable').DataTable({
            "paging": true,
            "pageLength": 10,
            "lengthMenu": [10, 50, 100],
            "pagingType": "full_numbers",
            "order": [],
            "searching": true,
            "info": true,
            "oLanguage": {
                "sSearch": "Buscar:",
                "sLengthMenu": "Mostrar _MENU_ linhas",
                "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ linhas",
                "oPaginate": {
                    "sFirst": '<i class="fas fa-angle-double-left"></i>',
                    "sPrevious": '<i class="fas fa-angle-left"></i>',
                    "sNext": '<i class="fas fa-angle-right"></i>',
                    "sLast": '<i class="fas fa-angle-double-right"></i>',
                },
            }

        });

    });
</script>

@endsection

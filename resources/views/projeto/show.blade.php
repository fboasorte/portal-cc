@extends('layouts.main')
@section('title', 'Projetos')
@section('content')
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
                            <table class="table custom-table">
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
                                    <tr class="inner-box clickable-row" data-href="{{ route('projeto.view', ['id' => $projeto->id]) }}">
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
document.addEventListener("DOMContentLoaded", function () {
    var rows = document.querySelectorAll(".clickable-row");

    rows.forEach(function (row) {
        row.addEventListener("click", function () {
            window.location.href = row.getAttribute("data-href");
        });
    });
});
</script>
@endsection

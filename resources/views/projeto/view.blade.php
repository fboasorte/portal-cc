@extends('layouts.main')
@section('title', 'Projeto')
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
            <h3 class="smaller-font">Projeto</h3>
        </div>
    </div>
</div>
<br>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table custom-table">
                    <tbody>
                        <tr>
                            <th scope="row">Data de Início</th>
                            <td>
                                <div class="event-date">
                                    <span class="date-day">{{ \Carbon\Carbon::parse($projetos->data_inicio)->format('d') }}</span><br>
                                    <span class="date-month">{{ $meses[\Carbon\Carbon::parse($projetos->data_inicio)->month] }}</span><br>
                                    <span class="date-year">{{ \Carbon\Carbon::parse($projetos->data_inicio)->format('Y') }}</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Data de Término</th>
                            <td>
                                <div class="event-date">
                                    <span class="date-day">{{ \Carbon\Carbon::parse($projetos->data_termino)->format('d') }}</span><br>
                                    <span class="date-month">{{ $meses[\Carbon\Carbon::parse($projetos->data_termino)->month] }}</span><br>
                                    <span class="date-year">{{ \Carbon\Carbon::parse($projetos->data_termino)->format('Y') }}</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Descrição</th>
                            <td>
                                <div class="event-student text-center">
                                    <span>{{ $projetos->descricao }}</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Professor</th>
                            <td>
                                <div class="event-orientador text-center">
                                    <span>{{ $projetos->nome_professor }}</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="text-center mt-4">
    <a href="{{ route('projetos.show') }}" class="btn custom-button custom-button-castastrar-tcc btn-default">Voltar</a>
</div>

@endsection

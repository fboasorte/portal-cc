@extends('layouts.main')
@section('title', 'projetos')
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
            <i class="fas fa-envelopes-bulk fa-2x"></i>
            <h3 class="smaller-font">Projetos</h3>
        </div>
    </div>
</div>
<br>

<ul class="nav nav-tabs container" id="myTabs">
    <li class="nav-item nav-item-tcc">
        <a class="nav-link active" id="professor-tab" data-toggle="tab" href="#professor" role="tab" aria-controls="professor" aria-selected="true">Coordenador</a>
    </li>
    <li class="nav-item nav-item-tcc">
        <a class="nav-link" id="ano-tab" data-toggle="tab" href="#ano" role="tab" aria-controls="ano" aria-selected="false">Ano de início</a>
    </li>
</ul>


@php
    date("Y-m-d");
@endphp

@php
    $professores = array();
    $datas = array();
@endphp

@foreach($projetos as $projeto)



    @if(!in_array( $projeto->nome_professor , $professores ))
        @php
            array_push($professores, $projeto->nome_professor);
        @endphp
    @endif

@endforeach

@foreach($projetos as $projeto)

    @if(!in_array( \Carbon\Carbon::parse($projeto->data_inicio)->format('Y') , $datas ))
        @php
            array_push($datas, \Carbon\Carbon::parse($projeto->data_inicio)->format('Y'));
        @endphp
    @endif

@endforeach













<div class="tab-content " id="myTabContent">
    <div class="tab-pane fade show active" id="professor" role="tabpanel" aria-labelledby="professor-tab">
        <div class="event-schedule-area-two bg-color pad100">
            <div class="container">

                @foreach($professores as $professor)

                    @php
                        $quantidade_projetos_professor = 0;
                    @endphp
                    @foreach ($projetos as $projeto)
                        @if($projeto->nome_professor == $professor)
                            @php
                                $quantidade_projetos_professor ++;
                            @endphp
                        @endif
                    @endforeach

                    <div class="professor-section mt-4">
                        <ul class="list-group custom-ul">
                            <li class="list-group-item d-flex justify-content-between align-items-center custom-title-tcc">
                                <span class="divisao-tcc text-wrap">
                                  {{$projeto->nome_professor}}
                                </span>
                                <span class="badge badge-primary custom-badge"> {{$quantidade_projetos_professor}}</span>
                            </li>

                            @foreach ($projetos as $projeto)
                                @if($projeto->nome_professor == $professor)
                                    <li class="list-group-item tcc-item d-flex justify-content-between align-items-center text-wrap">
                                        <a href="{{ route('projeto.view', ['id' => $projeto->id]) }}">{{$projeto->titulo}}</a>

                                        @if( date("Y-m-d") > $projeto->data_termino)
                                            <span class="badge bg-success">Concluído</span>
                                        @else
                                            <span class="badge bg-warning">Não concluído</span>
                                        @endif

                                    </li>
                                @endif
                            @endforeach
                        </ul>

                    </div>

                @endforeach

            </div>
        </div>
    </div>











    <div class="tab-pane fade" id="ano" role="tabpanel" aria-labelledby="ano-tab">
        <div class="event-schedule-area-two bg-color pad100">
            <div class="container">



                @foreach($datas as $data)

                    @php
                        $quantidade_datas = 0;
                    @endphp
                    @foreach ($projetos as $projeto)
                        @if( \Carbon\Carbon::parse($projeto->data_inicio)->format('Y')  == $data)
                            @php
                                $quantidade_datas++;
                            @endphp
                        @endif
                    @endforeach

                    <div class="ano-section mt-4">
                        <ul class="list-group">

                            <li class="list-group-item d-flex justify-content-between align-items-center custom-title-tcc">
                                <span class="divisao-tcc">
                                    <span class="text-wrap">{{ \Carbon\Carbon::parse($projeto->data_inicio)->format('Y') }}</span>
                                </span>
                                <span class="badge badge-primary custom-badge"> {{$quantidade_datas}}</span>

                            </li>


                            @foreach($projetos as $projeto)
                                @if(\Carbon\Carbon::parse($projeto->data_inicio)->format('Y') == $data)
                                    <li class="list-group-item tcc-item d-flex justify-content-between align-items-center text-wrap">
                                        <a href="{{ route('projeto.view', ['id' => $projeto->id]) }}">{{$projeto->titulo}}</a>
                                        
                                        @if( date("Y-m-d") > $projeto->data_termino)
                                            <span class="badge bg-success" >Concluído</span>
                                        @else
                                            <span class="badge bg-warning">Não concluído</span>
                                        @endif

                                    </li>
                                @endif
                            @endforeach

                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.tcc-item').click(function() {
            window.location = $(this).find('a').attr('href');
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#myTabs a').on('click', function(e) {
            e.preventDefault();
            $(this).tab('show');
        });
    });
</script>

@endsection

<!--

VERSÃO ANTIGA
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
            <i class="fas fa-envelopes-bulk fa-2x"></i>
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
<div class="text-center mt-4">
    <a href="{{ route('postagem.display') }}" class="btn custom-button custom-button-castastrar-tcc btn-default">Voltar</a>
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
-->

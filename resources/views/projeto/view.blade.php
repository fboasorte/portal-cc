@extends('layouts.main')
@section('title', 'Projeto')
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
            <i class="fas fa-envelopes-bulk fa-2x"></i>
            <h3 class="smaller-font">Projeto</h3>
        </div>
    </div>
</div>
<br>

<div class="container mt-5">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-sm-3">
                            <h6 class="mb-0">Título:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$projetos->titulo}}
                        </div>
                    </div>

                    <hr>

                    
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Descrição:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $projetos->descricao }}
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Data de Início:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$projetos->data_inicio}}
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Data de Termino:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$projetos->data_termino}}
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Coordenador:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$projetos->nome_professor}}
                        </div>
                    </div>

                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Professores Colaboradores:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           
                        @if (count($projetos->professoresColaboradores) > 0)
                            <!-- <span style="font-weight: bold;"> Professores Externos:</span><br> -->
                            @foreach ($projetos->professoresColaboradores as $key => $profColab)
                            
                            <span> {{ $profColab->nome }}@if ($key < count($projetos->professoresColaboradores) - 1), @else. @endif </span>
                            
                            @endforeach
                            <br>
                        @endif
                        </div>
                    </div>

                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Professores Externos:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                    
                        @if (count($projetos->professoresExternos) > 0)
                            <!-- <span style="font-weight: bold;"> Professores Externos:</span><br> -->
                            @foreach ($projetos->professoresExternos as $key => $profExterno)
                            <span> {{ $profExterno->nome }}@if ($key < count($projetos->professoresExternos) - 1), @else. @endif </span>
                            
                            @endforeach
                            <br>
                        @endif
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Alunos Bolsistas:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        
                        @if (count($projetos->alunosBolsistas) > 0)
                            @foreach ($projetos->alunosBolsistas as $key => $alunoBolsista)
                            <span> {{ $alunoBolsista->nome }}@if ($key < count($projetos->alunosBolsistas) - 1), @else. @endif </span>
                            @endforeach
                            <br>
                        @endif

                        </div>
                    </div>

                    <hr>

                    <!-- quando resolver pra bolsista resolve pra voluntário também -->
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Alunos Voluntários:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">

                        @if (count($projetos->alunosVoluntarios) > 0)
                            <!-- <span style="font-weight: bold;"> Professores Externos:</span><br> -->
                            @foreach ($projetos->alunosVoluntarios as $key => $alunoVoluntario)
                                <span> {{ $alunoVoluntario->nome }}@if ($key < count($projetos->alunosVoluntarios) - 1), @else. @endif </span>
                            @endforeach
                            <br>
                        @endif
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Resultados:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $projetos->resultados }}
                        </div>
                    </div>

                    <hr>

                    
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Fomento:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $projetos->fomento }}
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Página:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $projetos->link }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="text-center mt-4">
    <a href="{{ url()->previous() }}" class="btn custom-button custom-button-castastrar-tcc btn-default">Voltar</a>
</div>

@endsection

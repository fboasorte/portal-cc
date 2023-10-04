@extends('layouts.main')
@section('title', 'Professor')
@section('content')

<div class="custom-container">
    <div>
        <div>
            <i class="fas fa-chalkboard-teacher fa-2x"></i>
            <h3 class="smaller-font">Professor</h3>
        </div>
    </div>
</div>

<div class="container container-prof">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">

                            @if($professor->foto)
                            <img src="{{ asset('images/professor/' . $professor->foto) }}" class="rounded-circle" width="200">
                            @else
                            <img src="{{ asset('images/professor/professor_placeholder.png') }}" class="rounded-circle" width="200">
                            @endif
                            <div class="mt-3">
                                <h4>{{ $servidor->nome }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">E-mail:</h6>
                            <span class="text-secondary email">{{ $servidor->email }}</span>
                        </li>
                        @foreach ($curriculos as $curriculo)
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">{{$curriculo->curriculo}}:</h6>
                            <span class="text-secondary curriculo"><a href="https://{{ $curriculo->link }}" target="_blank">{{ $curriculo->link }}</a></span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nome:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $servidor->nome }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Titulação:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $professor->titulacao }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Áreas de Atuação: </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                @foreach ($areas as $area)
                                {{$area->area}}: <a href="https://{{ $area->link }}" target="_blank">{{ $area->link }}</a> <br>
                                @endforeach
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Biografia: </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $professor->biografia }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
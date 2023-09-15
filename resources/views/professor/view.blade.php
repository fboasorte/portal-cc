@extends('layouts.professor')

@section('title', 'Professores')

@section('content')
    <h1>Visualizar Professor</h1>
    <div class="row">
        <div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <img src="/">
                        <h3>Nome do professor:</h3>
                        <p>{{ $servidor->nome }}</p>
                        <h3>Email:</h3>
                        <p>{{ $servidor->email }}</p>
                        <h3>Titulacao:</h3>
                        <p>{{ $professor->titualcao }}</p>
                        <h3>Áreas de atuação:</h3>
                        <p></p>
                        <h3>Curriculo:</h3>
                        <a><p>{{ $professor->curriculo }}</p></a>
                        <h3>biografia:</h3>
                        <p>{{ $professor->biografia }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

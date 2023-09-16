@extends('layouts.professor')

@section('title', 'Professores')

@section('content')
    <h1>Visualizar Professor</h1>
    <div class="row">
        <div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    @if($professor->foto)
                        <img src="{{ asset('images/professor/' . $professor->foto) }}">
                    @else
                        <img src="{{ asset('images/professor/professor_placeholder.png') }}">
                    @endif
                        <h3>Nome do professor:</h3>
                        <p>{{ $servidor->nome }}</p>
                        <h3>Email:</h3>
                        <p>{{ $servidor->email }}</p>
                        <h3>Titulacao:</h3>
                        <p>{{ $professor->titualcao }}</p>

                        <h3>Curriculos:</h3>
                    @foreach ($curriculos as $curriculo)
                        <p>{{$curriculo->curriculo}}: <a href="https://{{ $curriculo->link }}" target="_blank">{{ $curriculo->link }}</a></p>
                    @endforeach

                        <h3>Areas de atuação:</h3>
                    @foreach ($areas as $area)
                        <p>{{$area->area}}: <a href="https://{{ $area->link }}" target="_blank">{{ $area->link }}</a></p>
                    @endforeach

                            <h3>biografia:</h3>
                            <p>{{ $professor->biografia }}</p>
                            <!-- <a href="{{ URL::previous() }}" class="btn btn-primary">Voltar</a> -->
                            <a href="{{ route('professor.index') }}" class="btn btn-primary">Voltar</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

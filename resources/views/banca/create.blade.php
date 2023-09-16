@extends('layouts.banca')

@section('title', 'Criar Banca')

@section('content')
<form method="post" action="{{ route('banca.store') }}">
    @csrf
    <div class="form-group">
        <label for="data">Data da banca</label>
        <input type="date" name="data" id="data" class="form-control" required>
        <label for="local">Local</label>
        <input type="text" name="local" id="local" class="form-control" placeholder="Local da banca" required>

        <div class="form-group">
            <label for="professores">Professores</label>

            @foreach ($professores_externos as $professor_externo)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="professores_externos[]" id="{{$professor_externo->id}}" value="{{$professor_externo->id}}"

                >
                <label for="" class="form-check-label">{{$professor_externo->nome}} - {{$professor_externo->filiacao}}</label>
            </div>
            @endforeach
            <a href="{{ route('professor-externo.create') }}">Cadastrar professor externo</a>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="{{ route('banca.index') }}">Cancelar</a>
</form>
@stop

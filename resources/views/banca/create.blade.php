 @extends('layouts.main')

@section('title', 'Criar Banca')

@section('content')

@include('layouts.sidebar',  ['title' => 'Gerenciar Banca','iconClass' => 'fas fa-chalkboard'])

<div class="container">
<form method="post" action="{{ route('banca.store') }}">
    @csrf
    <div class="form-group">
        <label for="data">Data da banca</label>
        <input type="date" name="data" id="data" class="form-control" required>
        <label for="local">Local</label>
        <input type="text" name="local" id="local" class="form-control" placeholder="Local da banca" required>

        <div class="form-group">
            <label for="professores">Professores internos</label>

            @foreach ($professores_internos as $professor_interno)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="professores_internos[]" id="{{$professor_interno->id}}" value="{{$professor_interno->id}}">
                <label for="" class="form-check-label">{{$professor_interno->nome}} </label>
            </div>
            @endforeach
            <a href="{{ route('professor.create') }}">Cadastrar professor interno</a>
        </div>
        <div class="form-group">
            <label for="professores">Professores externos</label>

            @foreach ($professores_externos as $professor_externo)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="professores_externos[]" id="{{$professor_externo->id}}" value="{{$professor_externo->id}}">
                <label for="" class="form-check-label">{{$professor_externo->nome}} - {{$professor_externo->filiacao}}</label>
            </div>
            @endforeach
            <a href="{{ route('professor-externo.create') }}">Cadastrar professor externo</a>
        </div>
    </div>
    <button type="submit" class="btn custom-button custom-button-castastrar-tcc btn-default">Cadastrar</button>
    <button class="btn custom-button custom-button-castastrar-tcc btn-default"><a
        href="{{ route('banca.index') }}" class="btn-back">Cancelar</a></button>

</form>
</div>
@stop

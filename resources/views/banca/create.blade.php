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

        <label for="">Professores</label> <br>

        <div>
            @for($i = 0; $i < count($professores_externos); $i++)
            <input type="checkbox" name="professor_{{$i}}" id="">
            <label for="">{{$professores_externos[$i]->nome}}</label> <br>
            @endfor
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
@stop

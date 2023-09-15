@extends('layouts.banca')

@section('title', 'Editar Banca')

@section('content')
<form method="post" action="{{ route('banca.update', ['id' => $banca->id]) }}">
    @csrf
    @method('PUT')
    <label for="data">Data da banca</label>
        <input type="date" name="data" id="data" class="form-control" value="{{date('Y-m-d', strtotime($banca->data))}}" required>
        <label for="local">Local</label>
        <input type="text" name="local" id="local" class="form-control" value="{{$banca->local}}" placeholder="Local da banca" required>

    <button class="btn btn-primary">Salvar</button>
</form>
@stop

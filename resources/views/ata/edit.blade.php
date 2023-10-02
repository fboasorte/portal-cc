@extends('layouts.main')

@section('title', 'Editar Ata')

@section('content')
    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-person-chalkboard fa-2x"></i>
                <h3 class="smaller-font">Editar ata</h3>
            </div>
        </div>
    </div>
    <div class="container">
    <form method="post" action="{{ route('ata.update', ['id' => $ata->id]) }}" enctype="multipart/form-data" id="form-colegiado">
        @method('PUT')
        @csrf
        <div class="form-group">
            <div>
                <label for="data">Data</label>
                <input type="date" name="data" id="data" class="form-control" value="{{ date('Y-m-d', strtotime($ata->data)) }}" required>
            </div>
            <div>
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control">{{ $ata->descricao }}</textarea>
            </div>
        </div>
        <button type="submit" class="btn custom-button custom-button-castastrar-tcc btn-default">Atualizar</button>
        <button class="btn custom-button custom-button-castastrar-tcc btn-default"><a href="{{ route('colegiado.index') }}" class="btn-back">Cancelar</a></button>
    </form>
    </div>
@stop

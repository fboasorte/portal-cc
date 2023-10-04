@extends('layouts.main')

@section('title', 'Cadastrar Ata')

@section('content')
    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-person-chalkboard fa-2x"></i>
                <h3 class="smaller-font">Cadastrar ata</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <form method="post" action="{{ route('ata.store') }}">
            @csrf
            <div class="mb-3">
                <label class="mt-5" for="data">Data</label>
                <input class="form-control" id="data" name="data" type="date" value="{{ date('Y-m-d', strtotime($hoje)) }}" required>
            </div>
            <div class="mb-3">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn custom-button btn-default">Cadastrar</button>
            <a href="{{ route('colegiado.index') }} "
                class="btn custom-button custom-button-castastrar-tcc btn-default">Cancelar</a>
        </form>
    </div>
@stop

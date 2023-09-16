@extends('layouts.menu')
@section('title', 'Editar TCC')
@section('content')

<div class="custom-container">
    <div>
        <div>
            <i class="fas fa-graduation-cap fa-2x"></i>
            <h3 class="smaller-font">Editar TCC</h3>
        </div>
    </div>
</div>

<div class="container mt-4">
    <form method="post" action="{{ route('tcc.update', [$tcc->id]) }}">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label"> <br>Título*:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título do TCC" value="{{ $tcc->titulo }}" required>
        </div>
        <div class="mb-3">
            <label for="resumo" class="form-label"><br>Resumo*:</label>
            <textarea name="resumo" id="resumo" class="form-control" rows="4" placeholder="Resumo do TCC" required>{{ $tcc->resumo }}</textarea>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label"><br>Link para Download:</label>
            <input type="url" name="link" id="link" class="form-control" placeholder="Insira o link para download" value="{{ $tcc->link }}">
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="aluno_id" class="form-label"> <br>Aluno*:</label>
                <select name="aluno_id" id="aluno_id" class="form-select" required>
                    @foreach ($alunos as $aluno => $key)
                        <option value="{{ $aluno }}" {{ $aluno == $id ? 'selected' : '' }}>
                            {{ $key }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-3 d-flex align-items-end">
                <a href="{{ route('aluno.create') }}" class="btn custom-button">Cadastrar Aluno</a>
            </div>
        </div>
        <div class="mb-3">
            <label for="banca_id" class="form-label"> <br>Banca:</label>
            <select name="banca_id" id="banca_id" class="form-select">
                <option value="" disabled selected>Selecione uma banca</option>
                @foreach ($bancas as $banca => $key)
                <option value="{{ $banca }}" {{ $banca == $id ? 'selected' : '' }}>{{ date('d/m/Y', strtotime($key->data)) }} - {{$key->local}} - [
                    @foreach ($key->professoresExternos as $professorExterno )
                    {{$professorExterno->nome}}
                    @endforeach
                    ]
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mb-3 d-flex align-items-end">
            <a href="{{ route('banca.create') }}" class="btn custom-button">Criar uma banca</a>
        </div>
        <div class="mb-3">
            <label for="data" class="form-label"><br>Data*:</label>
            <input type="date" name="data" id="data" class="form-control" required value="{{ $tcc->ano }}">
        </div>

        <div>
            <input type="checkbox" name="convite" id="convite" checked>
            <label for="convite"> Alterar dados no convite </label>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn custom-button custom-button-castastrar-tcc">Atualizar</button>
            <button class="btn custom-button custom-button-castastrar-tcc"><a href="{{route('tcc.index')}}" >Cancelar</a></button>
        </div>
    </form>
</div>

@endsection

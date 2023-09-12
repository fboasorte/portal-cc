@extends('layouts.tccLayout')

@section('title', 'Editar TCC')

@section('content')
    <h1>Editar TCC</h1>
    <form method="post" action="{{ route('update_tcc', [$tcc->id]) }}">
        @csrf
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título do TCC" value="{{ $tcc->titulo }}" required>
        </div>
        <div class="form-group">
            <label for="resumo">Resumo</label>
            <textarea name="resumo" id="resumo" cols="30" rows="8" class="form-control" placeholder="Resumo" value="{{ $tcc->resumo }}" required>{{ $tcc->resumo }}</textarea>
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" name="link" id="link" class="form-control" placeholder="Possui link? Coloque aqui" value="{{ $tcc->link }}">
        </div>
        <div>
            <label for="data">Data</label>
            <input type="date" name="data" id="data" class="form-control" required value="{{ $tcc->ano }}">
        </div>
        <div>
            <label>Aluno</label>
            <select name="aluno_id" id="aluno_id" class="form-control" required>
                @foreach ($alunos as $aluno => $key)
                    <option value="{{ $aluno }}" {{ $aluno == $id ? 'selected' : '' }}>
                        {{ $key }}
                    </option>
                @endforeach
            </select>
            <a href="{{ route ('create_aluno') }}">Cadastrar novo aluno?</a>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>

    </form>

@endsection

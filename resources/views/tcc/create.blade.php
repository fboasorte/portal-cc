@extends('layouts.tccLayout')

@section('title', 'Cadastrar novo TCC')

@section('content')
<form method="post" action="{{ route('store_tcc') }}">
    @csrf
    <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título do TCC" required>
    </div>
    <div class="form-group">
        <label for="resumo">Resumo</label>
        <textarea name="resumo" id="resumo" cols="30" rows="8" class="form-control" placeholder="Resumo" required></textarea>
    </div>
    <div class="form-group">
        <label for="link">Link</label>
        <input type="url" name="link" id="link" class="form-control" placeholder="Possui link? Coloque aqui">
    </div>
    <div>
        <label for="data">Data</label>
        <input type="date" name="data" id="data" class="form-control" required>
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

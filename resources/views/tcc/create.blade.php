@extends('layouts.menu')
@section('title', 'Cadastrar TCC')
@section('content')

<div class="custom-container">
    <div>
        <div>
            <i class="fas fa-graduation-cap fa-2x"></i>
            <h3 class="smaller-font">Cadastro do TCC</h3>
        </div>
    </div>
</div>


<div class="container mt-4">
    <form method="post" action="{{ route('tcc.store') }}">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label"> <br>Título*:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título do TCC" required>
        </div>
        <div class="mb-3">
            <label for="resumo" class="form-label"><br>Resumo*:</label>
            <textarea name="resumo" id="resumo" class="form-control" rows="4" placeholder="Resumo do TCC" required></textarea>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label"><br>Link para Download:</label>
            <input type="url" name="link" id="link" class="form-control" placeholder="Insira o link para download">
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="aluno_id" class="form-label"> <br>Aluno*:</label>
                <select name="aluno_id" id="aluno_id" class="form-select" required>
                    <option value="" disabled selected>Selecione um aluno</option>
                    @foreach ($alunos as $aluno => $key)
                    <option value="{{ $aluno }}">{{ $key }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-3 d-flex align-items-end">
                <a href="{{ route('aluno.create') }}" class="btn custom-button">Cadastrar Aluno</a>
            </div>
        </div>
        <div class="mb-3">
            <label for="banca_id" class="form-label"> <br>Orientador:</label>
            <select name="professor_id" id="professor_id" class="form-select">
                <option value="" disabled selected>Selecione um orientador</option>
                @foreach ($professores as $professor)
                <option value="{{ $professor->id }}">({{$professor->id}}) - {{$professor->nome}} </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mb-3 d-flex align-items-end">
            <a href="{{ route('professor.create') }}" class="btn custom-button">Cadastrar novo professor</a>
        </div>
        <div class="mb-3">
            <label for="banca_id" class="form-label"> <br>Banca:</label>
            <select name="banca_id" id="banca_id" class="form-select">
                <option value="" disabled selected>Selecione uma banca</option>
                @foreach ($bancas as $banca)
                <option value="{{ $banca->id }}">
                    {{ date('d-m-Y', strtotime($banca->data)) }} - {{$banca->local}} -
                    MEMBROS:
                    @foreach ($banca->professoresExternos as $professorExterno )
                    [{{$professorExterno->nome}} - {{$professorExterno->filiacao}}]
                    @endforeach

                    @foreach ($professores as $professor)
                    {{ $banca->professores->contains($professor->id) ? '['. $professores->where('id', $professor->id)->first()->nome .' - IFNMG]': '' }}
                    @endforeach
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mb-3 d-flex align-items-end">
            <a href="{{ route('banca.create') }}" class="btn custom-button">Criar uma banca</a>
        </div>
        <div class="mb-3">
            <label for="data" class="form-label"><br>Data*:</label>
            <input type="date" name="data" id="data" class="form-control" value="" required>
        </div>

        <div>
            <input type="checkbox" name="convite" id="convite" checked>
            <label for="convite">Gerar um convite do TCC e publicá-lo </label>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn custom-button custom-button-castastrar-tcc">Cadastrar TCC</button>
            <button class="btn custom-button custom-button-castastrar-tcc"><a href="{{route('tcc.index')}}" >Cancelar</a></button>
        </div>
    </form>
</div>
</form>

<script>
        document.getElementById("banca_id").addEventListener("change", function () {
            var selectedOption = this.options[this.selectedIndex];
            var selectedDate = selectedOption.getAttribute("data-data");
            document.getElementById("data").value = selectedDate;
        });

</script>

@endsection

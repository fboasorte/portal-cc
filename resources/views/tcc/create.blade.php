@extends('layouts.main')
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
    <form method="post" action="{{ route('tcc.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label"> <br>Título*:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título do TCC" required>
        </div>
        <div class="mb-3">
            <label for="resumo" class="form-label"><br>Resumo*:</label>
            <textarea name="resumo" id="resumo" class="form-control" rows="4" placeholder="Resumo do TCC" required></textarea>
        </div>

        <div class="row">
            <div class="mb-3">
                <label for="aluno_id" class="form-label"> <br>Aluno*:</label>
                <select name="aluno_id" id="aluno_id" class="form-select" required>
                    <option value="" disabled selected>Selecione um aluno</option>
                    @foreach ($alunos as $aluno => $key)
                    <option value="{{ $aluno }}"> {{ $key }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 mb-3 d-flex align-items-end">
                <a href="" class="btn custom-button modal-trigger" data-bs-toggle="modal" data-bs-target="#createAluno">Cadastrar aluno</a>
            </div>
            @include('modal.createAluno')
        </div>
        <div class="mb-3">
            <label for="banca_id" class="form-label"> <br>Orientador:</label>
            <select name="professor_id" id="professor_id" class="form-select">
                <option value="" disabled selected>Selecione um orientador</option>
                @foreach ($professores as $professor)
                <option value="{{ $professor->id }}"> {{$professor->nome}} </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mb-3 d-flex align-items-end">
            <a href="" class="btn custom-button modal-trigger" data-bs-toggle="modal" data-bs-target="#createProfessor">Cadastrar professor</a>
        </div>
        @include('modal.createProfessor')
        @include('modal.createProfessorExterno')
        <div class="mb-3">
            <label for="banca_id" class="form-label"> <br>Banca:</label>
            <select name="banca_id" id="banca_id" class="form-select">
                <option value="" disabled selected>Selecione uma banca</option>
                @foreach ($bancas as $banca)
                <option value="{{ $banca->id }}">
                    {{ date('d-m-Y', strtotime($banca->data)) }} - {{$banca->local}} -
                    MEMBROS:
                    @foreach ($banca->professoresExternos as $professorExterno )
                    {{$professorExterno->nome}} - {{$professorExterno->filiacao}},
                    @endforeach

                    @foreach ($professores as $professor)
                    {{ $banca->professores->contains($professor->id) ? ''. $professores->where('id', $professor->id)->first()->nome .' - IFNMG,': '' }}
                    @endforeach
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mb-3 d-flex align-items-end">
            <a href="" class="btn custom-button modal-trigger" data-bs-toggle="modal" data-bs-target="#createBanca">Cadastrar banca</a>
        </div>
        @include('modal.createBanca')
        <div class="mb-3">
            <label for="ano" class="form-label"><br>Ano*:</label>
            <input type="number" name="ano" id="ano" class="form-control" min="1500" value="{{$anoAtual}}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label"><br>Status*:</label>
            <select name="status" id="status" class="form-select">
                <option value="0" selected>Aguardando defesa</option>
                <option value="1">Concluido</option>
            </select>
            <div class="mb-3" id="arquivo_id">
                <label for="arquivo" class="form-label"><br>Arquivo:</label>
                <input type="file" name="arquivo" id="arquivo" class="form-control">
            </div>
        </div>
        <div>
            <input type="checkbox" name="convite" id="convite" checked>
            <label for="convite">Gerar um convite do TCC e publicá-lo </label>
        </div>


        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn custom-button custom-button-castastrar-tcc btn-default">Cadastrar
                TCC</button>
            <a href="{{ route('tcc.index') }} " class="btn custom-button custom-button-castastrar-tcc btn-default">Cancelar</a>
        </div>
    </form>
</div>
</form>


<script>
    document.getElementById("banca_id").addEventListener("change", function() {
        var selectedOption = this.options[this.selectedIndex];
        var selectedDate = selectedOption.getAttribute("data-data");
        document.getElementById("data").value = selectedDate;
    });

    var statusSelect = document.getElementById("status");
    var conviteCheckbox = document.getElementById("convite");
    var arquivo = document.getElementById("arquivo_id");
    arquivo.style.display = "none";

    statusSelect.addEventListener("change", function() {
        if (statusSelect.value === "1") {
            conviteCheckbox.checked = false;
            conviteCheckbox.disabled = true;
            arquivo.style.display = "block";
        } else {
            conviteCheckbox.disabled = false;
            conviteCheckbox.checked = true;
            arquivo.style.display = "none";
        }
    });
</script>

@endsection
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
    <form method="post" action="{{ route('tcc.update', [$tcc->id]) }}" enctype="multipart/form-data">
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
                <a href="" class="btn custom-button modal-trigger" data-bs-toggle="modal" data-bs-target="#createAluno" >Cadastrar novo aluno</a>
            </div>
            @include('modal.createAluno')
        </div>
        <div class="mb-3">
            <label for="banca_id" class="form-label"> <br>Orientador:</label>
            <select name="professor_id" id="professor_id" class="form-select">
                <option value="" disabled selected>Selecione um orientador</option>
                @foreach ($professores as $professor)
                <option value="{{ $professor->id }}" {{ $professor->id == $tcc->professor_id ? 'selected' : '' }}> {{$professor->nome}} </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mb-3 d-flex align-items-end">
            <a href="" class="btn custom-button modal-trigger" data-bs-toggle="modal" data-bs-target="#createProfessor" >Cadastrar novo profesor</a>
        </div>
        @include('modal.createProfessor')
        <div class="mb-3">
            <label for="banca_id" class="form-label"> <br>Banca:</label>
            <select name="banca_id" id="banca_id" class="form-select">
                <option value="" disabled selected>Selecione uma banca</option>
                @foreach ($bancas as $banca => $key)
                <option value="{{ $banca }}" {{ $banca == $id ? 'selected' : '' }}>
                    {{ date('d/m/Y', strtotime($key->data)) }} - {{$key->local}} -
                    MEMBROS:
                    @foreach ($key->professoresExternos as $professorExterno )
                    [{{ $professorExterno->nome }} - {{ $professorExterno->filiacao}}]
                    @endforeach

                    @foreach ($professores as $professor)
                    {{ $key->professores->contains($professor->id) ? '['. $professores->where('id', $professor->id)->first()->nome .' - IFNMG]': '' }}
                    @endforeach
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mb-3 d-flex align-items-end">
            <a href="" class="btn custom-button modal-trigger" data-bs-toggle="modal" data-bs-target="#createBanca" >Cadastrar uma banca</a>
        </div>
        @include('modal.createBanca')
        <div class="mb-3">
            <label for="ano" class="form-label"><br>Ano*:</label>
            <input type="number" name="ano" id="ano" class="form-control" min="1500" value="{{$anoTcc}}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label"><br>Status*:</label>
            <select name="status" id="status" class="form-select">
                <option value="0" {{ $tcc->status == 0 ? 'selected' : '' }}>Aguardando defesa</option>
                <option value="1" {{ $tcc->status == 1 ? 'selected' : '' }}>Concluido</option>
            </select>
            <div class="mb-3" id="arquivo_id">
                <label for="arquivo" class="form-label"><br>Arquivo:</label>
                @if($tcc->status == 1 && $tcc->arquivo)
                <a href="{{ asset($tcc->arquivo->path) }}" download>{{ $tcc->arquivo->nome }}</a>
                @endif
                <input type="file" name="arquivo" id="arquivo" class="form-control">
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn custom-button custom-button-castastrar-tcc">Atualizar</button>
            <button class="btn custom-button custom-button-castastrar-tcc"><a href="{{route('tcc.index')}}" >Cancelar</a></button>
        </div>
    </form>
</div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var statusSelect = document.getElementById("status");
        var arquivo = document.getElementById("arquivo_id");
        if(statusSelect.value == 1) {
            arquivo.style.display = "block";
        }else {
            arquivo.style.display = "none";
        }

        statusSelect.addEventListener("change", function () {
            if (statusSelect.value === "1") {
                arquivo.style.display = "block";
            } else {
                arquivo.style.display = "none";
            }
        });
    });


</script>

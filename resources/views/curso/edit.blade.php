@extends('layouts.main')

@section('title', 'Editar Curso')

@section('content')
    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-graduation-cap fa-2x"></i>
                <h3 class="smaller-font">Editar Curso</h3>
            </div>
        </div>
    </div>
    <div class="container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <form method="post" action="{{ route('curso.update', $curso->id) }}">
            @csrf
            @method('PUT') {{-- Usamos @method('PUT') para indicar que esta é uma atualização --}}

            <div class="form-group mb-3">
                <label for="nome">Nome:</label>
                <input class="form-control" type="text" id="nome" name="nome" value="{{ $curso->nome }}" placeholder="Informe o nome do Curso" required>
            </div>
            <div class="form-group mb-3">
                <label for="turno">Turno:</label>
                <select class="form-control" id="turno" name="turno" required>
                    <option value="Matutino" @if($curso->turno == 'Matutino') selected @endif>Matutino</option>
                    <option value="Vespertino" @if($curso->turno == 'Vespertino') selected @endif>Vespertino</option>
                    <option value="Noturno" @if($curso->turno == 'Noturno') selected @endif>Noturno</option>
                    <option value="Integral" @if($curso->turno == 'Integral') selected @endif>Integral</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="carga_horaria">Carga Horária:</label>
                <input class="form-control" type="number" id="carga_horaria" name="carga_horaria" value="{{ $curso->carga_horaria }}" placeholder="Informe a carga horária">
            </div>
            <div class="form-group mb-3">
                <label for="sigla">Sigla:</label>
                <input class="form-control" type="text" id="sigla" name="sigla" value="{{ $curso->sigla }}" placeholder="Informe a sigla" maxlength="5">
            </div>
            <div class="form-group mb-3">
                <label for="analytics">Analytics:</label>
                <input class="form-control" type="text" id="analytics" name="analytics" value="{{ $curso->analytics }}" placeholder="Informe o analytics">
            </div>
            <div class="form-group">
                <label for="calendario">Calendario</label>
                @if (count($curso->calendario) > 0)
                        <button class="btn text-danger" type="submit" form="deletar-calendario{{ $calendario->id }}">X</button>
                        <a href="{{ URL::asset('storage') }}/{{ $calendario->path }}"></a>
                @endif
                <input type="file" name="calendario" id="calendario" class="form-control">
            </div>
            <div class="form-group">
                <label for="horario">Horario</label>
                @if (count($curso->horario) > 0)
                        <button class="btn text-danger" type="submit" form="deletar-horario{{ $horario->id }}">X</button>
                        <a href="{{ URL::asset('storage') }}/{{ $horario->path }}"></a>
                @endif
                <input type="file" name="horario" id="horario" class="form-control">
            </div>
            <button type="submit" class="btn custom-button btn-default">Atualizar</button>
            <a href="{{ route('curso.index') }}" class="btn custom-button custom-button-castastrar-tcc btn-default btn-back">Cancelar</a>
        </form>

        @if (count($curso->calendario) > 0)
            <form id="deletar-calendario{{ $calendario->id }}"
                action="{{ route('curso.delete_calendario', ['id' => $calendario->id]) }}" method="post">
                @csrf
                @method('delete')
            </form>
         @endif
         @if (count($curso->horario) > 0)
            <form id="deletar-horario{{ $horario->id }}"
                action="{{ route('curso.delete_horario', ['id' => $horario->id]) }}" method="post">
                @csrf
                @method('delete')
            </form>
         @endif

    </div>
@stop

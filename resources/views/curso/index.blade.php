@extends('layouts.main')

@section('title', 'Cursos')

@section('content')
    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-person-chalkboard fa-2x"></i>
                <h3 class="smaller-font">Gerenciar Cursos</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row campo-busca">
            <div class="col-md-12">
                <input type="text" id="searchInput" class="form-control field-search" placeholder="Buscar em todos os campos"
                    aria-label="Buscar">
            </div>
        </div>
        <div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white div-form">
                        Cursos
                        <a href="{{ route('curso.create') }}" class="btn btn-success btn-sm float-end">Cadastrar</a>
                    </div>
                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Sigla</th>
                                    <th>Turno</th>
                                    <th>Carga Horária</th>
                                    <th>Calendario</th>
                                    <th>Horario</th>
                                    <th>Criação</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cursos as $curso)
                                    <tr>
                                        <td>{{ $curso->id }}</td>
                                        <td>{{ $curso->nome }}</td>
                                        <td>{{ $curso->sigla }}</td>
                                        <td>{{ $curso->turno }}</td>
                                        <td>{{ $curso->carga_horaria }} Hrs</td>
                                        <td>
                                            @if ($curso->calendario)
                                            <a href="{{ route('curso.download_calendario', ['id' => $curso->id]) }}" class="btn btn-primary">Baixar Calendário</a>
                                             @endif
                                        </td>
                                        <td>
                                            @if ($curso->horario)
                                            <a href="{{route('curso.download_horario',['id'=>$curso->id]) }}" class="btn btn-primary">Baixar Horário</a>
                                            @endif
                                        </td>
                                        <td>{{ date_format($curso->created_at, 'd/m/Y H:i:s') }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('curso.destroy', $curso->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('curso.edit', $curso->id) }}">Editar</a>
                                                <button type="submit" class="btn btn-danger btn-sm" title='Delete'
                                                    onclick="return confirm('Deseja realmente excluir esse curso?')"><i class="fas fa-trash"></i></button>
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('curso.coordenador', $curso->id) }}">Coordenador</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop

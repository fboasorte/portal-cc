@extends('layouts.main')

@section('title', 'Colegiado')

@section('content')
    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-paste fa-2x"></i>
                <h3 class="smaller-font">Colegiado</h3>
            </div>
        </div>
    </div>

    <div class="container">
        <div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-white div-form">
                            Colegiado Atual
                            <a href=" {{ route('colegiado.create') }} " class="btn btn-success btn-sm float-end">Novo</a>
                            <div>
                                <h5>Portaria vigente:
                                {{ $colegiado_atual ? 'Nº ' . $colegiado_atual->numero_portaria : 'Sem portaria vigente' }}
                                </h5>
                            </div>
                            <div>
                                <p>{{ $colegiado_atual ? 'De ' .date('d/m/Y', strtotime($colegiado_atual->inicio)) .' até '
                                    .date('d/m/Y', strtotime($colegiado_atual->fim))  : '-' }}
                                </p>
                            </div>
                            <div id="pdf">
                            @if($colegiado_atual && $colegiado_atual->arquivoPortaria)
                                <a href="{{ asset($colegiado_atual->arquivoPortaria->path) }}" download>Download portaria Nº {{ $colegiado_atual->numero_portaria }}</a>
                            @else
                                Sem arquivo de portaria disponível
                            @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <h5>Membros</h5>
                                <p>{{$totalMembros}}</p>
                                <thead>
                                    <tr>
                                        <th>Presidente</th>
                                        <th>Docentes</th>
                                        <th>Discentes</th>
                                        <th>Técnico administrativo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>{{ $colegiado_atual ? $colegiado_atual->presidente->servidor->nome : '-' }}</td>
                                            <td>
                                                @if ($colegiado_atual)
                                                    @foreach ($colegiado_atual->professores as $professor)
                                                    <p>{{ $professor->servidor->nome }}</p>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if ($colegiado_atual)
                                                    @foreach ($colegiado_atual->alunos as $aluno)
                                                    <p>{{ $aluno->nome }}</p>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if ($colegiado_atual)
                                                    @foreach ($colegiado_atual->tecnicosAdm as $tecnicoAdm)
                                                    <p>{{ $tecnicoAdm->nome }}</p>
                                                    @endforeach
                                                @endif
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                            <form method="POST"
                                action="">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <a href=""
                                    class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <button type="submit" class="btn btn-danger btn-sm" title='Delete'
                                    onclick="return confirm('Deseja realmente excluir esse registro?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>

                    @foreach ($colegiados as $colegiado )
                    @if ($colegiado->numero_portaria != $colegiado_atual->numero_portaria)

                    <div class="card">
                        <div class="card-header text-white div-form">
                            Colegiado
                            <div>
                                <h5>Portaria:
                                    {{ $colegiado ? 'Nº ' . $colegiado->numero_portaria : 'Sem portaria vigente' }}
                                </h5>
                            </div>
                            <div>
                                <p>{{ $colegiado? 'De ' .date('d/m/Y', strtotime($colegiado->inicio)) .' até '
                                    .date('d/m/Y', strtotime($colegiado->fim))  : '-' }}
                                </p>
                            </div>
                            <div id="pdf">
                                @if($colegiado && $colegiado->arquivoPortaria)
                                <a href="{{ asset($colegiado_atual->arquivoPortaria->path) }}" download>Download portaria Nº {{ $colegiado->numero_portaria }}</a>
                                @else
                                Sem arquivo de portaria disponível
                                @endif
                            </div>
                            <form method="POST"
                            action="">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <a href=""
                            class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <button type="submit" class="btn btn-danger btn-sm" title='Delete'
                                onclick="return confirm('Deseja realmente excluir esse registro?')"><i class="fas fa-trash"></i></button>
                            </form>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
        </div>
    </div>
    @stop

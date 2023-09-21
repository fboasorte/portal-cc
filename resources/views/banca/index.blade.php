@extends('layouts.main')

@section('title', 'Banca')

@section('content')
@include('layouts.sidebar',  ['title' => 'Gerenciar Banca','iconClass' => 'fas fa-chalkboard'])

    <div class="container">
        <div class="row campo-busca">
            <div class="col-md-12">
                <form action="" method="get">
                    <div class="input-group mb-3 field-search">
                        <form action="" method="get">
                            <input type="date" name="buscar" id="buscar">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                        </form>
                    </div>
                </form>
            </div>

            <div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-white div-form">
                            Banca
                            <a href="{{ route('banca.create') }}" class="btn btn-success btn-sm float-end">Cadastrar</a>
                        </div>
                        <div class="card-body">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Data</th>
                                        <th>Local</th>
                                        <th>Membros</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bancas as $banca)
                                        <tr>
                                            <td>{{ $banca->id }}</td>
                                            <td>{{ date('d-m-Y', strtotime($banca->data)) }}</td>
                                            <td>{{ $banca->local }}</td>
                                            <td>
                                                @foreach ($banca->professoresExternos as $professor_externo)
                                                    <p>{{ $professor_externo->nome }} - {{ $professor_externo->filiacao }}
                                                    </p>
                                                @endforeach

                                                @foreach ($banca->professores as $professor)
                                                    <p>{{ $professores_internos->contains($professor->id) ? $professores_internos->where('id', $professor->id)->first()->nome : '' }}
                                                        - IFNMG </p>
                                                @endforeach
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('banca.destroy', $banca->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <a href="{{ route('banca.edit', $banca->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                    <button type="submit" class="btn btn-danger btn-sm" title='Delete'
                                                        onclick="return confirm('Deseja realmente excluir essa banca?')"><i class="fas fa-trash"></i></button>
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

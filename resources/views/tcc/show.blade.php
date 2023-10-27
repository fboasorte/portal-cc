@extends('layouts.main')
@section('title', 'TCC')
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>


<div class="custom-container">
    <div>
        <div>
            <i class="fas fa-graduation-cap fa-2x"></i>
            <h3 class="smaller-font">TCC</h3>
        </div>
    </div>
</div>
<br>
<div class="event-schedule-area-two bg-color pad100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                        <div class="table-responsive">
                            <table id="tccTable" class="table custom-table table-hover">
                                <thead class="custom-table-head">
                                    <tr>
                                        <th class="text-center" scope="col">Ano</th>
                                        <th class="text-center" scope="col">Título</th>
                                        <th class="text-center" scope="col">Aluno</th>
                                        <th class="text-center" scope="col">Orientador</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tccs as $tcc)
                                    <tr class="inner-box clickable-row linha" data-href="{{ route('tcc.view', ['id' => $tcc->id]) }}">
                                        <td>
                                            <div class="event-title text-center">
                                                <span>{{ $tcc->ano }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="event-title text-center">
                                                <span>{{ $tcc->titulo }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="event-student text-center">
                                                <span><i class="fas fa-user-graduate"></i>&nbsp;{{ $tcc->nome }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="event-orientador text-center">
                                                <span>{{ $tcc->nome_professor }}</span>
                                            </div>
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
</div>
<div class="text-center mt-4">
    <a href="{{ route('postagem.display') }}" class="btn custom-button custom-button-castastrar-tcc btn-default">Voltar</a>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var rows = document.querySelectorAll(".clickable-row");

        rows.forEach(function(row) {
            row.addEventListener("click", function() {
                window.location.href = row.getAttribute("data-href");
            });
        });

        $('#tccTable').DataTable({
            "paging": true,
            "pageLength": 10,
            "lengthMenu": [10, 50, 100],
            "pagingType": "full_numbers",
            "order": [],
            "searching": true,
            "info": true,
            "oLanguage": {
                "sSearch": "Buscar:",
                "sLengthMenu": "Mostrar _MENU_ linhas",
                "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ linhas",
                "oPaginate": {
                    "sFirst": '<i class="fas fa-angle-double-left"></i>',
                    "sPrevious": '<i class="fas fa-angle-left"></i>',
                    "sNext": '<i class="fas fa-angle-right"></i>',
                    "sLast": '<i class="fas fa-angle-double-right"></i>',
                },
            }

        });

    });
</script>
@endsection
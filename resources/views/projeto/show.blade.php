@extends('layouts.main')
@section('title', 'Projetos')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<style>

.bloco1{
  background-color:#1c2c4c;
  display:flex;
  flex-direction:row;
  flex-wrap:nowrap;
  align-items:stretch;
  justify-content:space-between;
  min-width:1000px;


  border:1px solid black;
  border-radius:30px;
  overflow:hidden;
  margin:40px 13px;
}

.bloco3{
  display:flex;
  flex-direction:column;
  justify-content:center;
  width:600px;

  border-radius:30px;


}


.bloco4{

  display:flex;
  flex-direction:row;
  justify-content:space-between;
  align-items:center;


  width:500%;
  max-width:500px;
  color:white;
  text-align:center;
  font-size:110%;

}

.bloco41{
  padding: 0.6% 0.1%;
  text-align:center;

  width:50%;
}




.texto{

  display: table-cell;
  vertical-align: bottom;
  background-color:white;
  font-size:150%;
  font-weight:bold;
  text-align:center;
  text-shadow: 0.1px 0.1px;

 -moz-border-radius: 10px 10px 0 0;

}

</style>

@php
    $meses = [
        1 => 'Janeiro',
        2 => 'Fevereiro',
        3 => 'Março',
        4 => 'Abril',
        5 => 'Maio',
        6 => 'Junho',
        7 => 'Julho',
        8 => 'Agosto',
        9 => 'Setembro',
        10 => 'Outubro',
        11 => 'Novembro',
        12 => 'Dezembro',
    ];
@endphp
<div class="custom-container">
    <div>
        <div>
            <i class="fas fa-graduation-cap fa-2x"></i>
            <h3 class="smaller-font">Projetos</h3>
        </div>
    </div>
</div>
<br>

  <div style = "text-align:center; font-weight:bold; font-size:170%; margin-top:20px; padding: 8px 0px; border-top:0.4px solid gray; border-bottom: 0.4px solid gray;">
    <span>Lista de projetos</span>
  </div>

  <div>
    @forelse ($projetos as $projeto)
    <div class="inner-box clickable-row linha bloco1" data-href="{{ route('projeto.view', ['id' => $projeto->id]) }}">

      <div class = "bloco3">
        <div class = "bloco4" style = "border-bottom:1px solid gray;">

          <div class = "borda3 bloco41">
              <div class="text-center" scope="col">Data de Inicio: </div>
          </div>


          <div class = "bloco41" >
              <div class="text-center" style = "color:white">
                  <span class="date-day">{{ \Carbon\Carbon::parse($projeto->data_inicio)->format('d') }}</span><br>
                  <span class="date-month">{{ $meses[\Carbon\Carbon::parse($projeto->data_inicio)->month] }}</span><br>
                  <span class="date-year">{{ \Carbon\Carbon::parse($projeto->data_inicio)->format('Y') }}</span>
              </div>
          </div>
        </div>

        <div class = "bloco4">

          <div class = "borda3 bloco41" >
              <div class="text-center" scope="col">Data de Encerramento:</div>
          </div>

          <div class = "bloco41" >
              <div class="text-center" style = "color:white;">
                  <span class="date-day">{{ \Carbon\Carbon::parse($projeto->data_termino)->format('d') }}</span><br>
                  <span class="date-month">{{ $meses[\Carbon\Carbon::parse($projeto->data_termino)->month] }}</span><br>
                  <span class="date-year">{{ \Carbon\Carbon::parse($projeto->data_termino)->format('Y') }}</span>
              </div>
          </div>
        </div>

    </div>
    <div class = "bloco3" style = "background-color:white; border-radius:0px; width:60%; ">
      <div class = "texto">
        <span>Projeto criado por {{ $projeto->nome_professor }} .</span>
        <br>
        <span>Clique para ver detalhes sobre o projeto</span>
      </div>
    </div>

        <!--
        <div style = "background-color:red;">
            <div class=" event-student text-center">
                <span>{{ $projeto->descricao}}</span>
            </div>
        </div>

        <div style = "background-color:purple;">
            <div class=" event-orientador text-center">
                <span>{{ $projeto->nome_professor }}</span>
            </div>
        </div>
      -->
  </div>
  @empty
  <div style = "text-align:center; font-size:150%;">
    <span>Nenhum projeto foi criado.</span>
  </div>
  @endforelse

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var rows = document.querySelectorAll(".clickable-row");

        rows.forEach(function(row) {
            row.addEventListener("click", function() {
                window.location.href = row.getAttribute("data-href");
            });
        });

        $('#projetoTable').DataTable({
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

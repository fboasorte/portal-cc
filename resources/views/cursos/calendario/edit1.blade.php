@extends('layouts.main')
@section('title', 'calendario')
@section('content')

  <style>

      li{
        font-weight:bold;
        list-style-type:none;
        padding-top:0.1%;
        padding-bottom:0.1%;
      }

      #titulo-calendario{
        background-color: #1c2c4c;
        color: #fff;
      }

      a{
        text-decoration:none;
      }

      .deletar{
        padding-top:0.1%;
        padding-bottom:0.1%;

        padding-left:0.6%;
        padding-right:0.3%;

        border:none;
        background-color:#1c2c4c;
      }

  </style>

  <div id = "titulo-calendario" class="d-flex justify-content-between align-items-center py-2">
    <div style = "text-align:center;  margin:auto; width:50%;">
      <span class="material-symbols-outlined" style = "font-size:190%;"> calendar_month </span>

      <div style = "text-align:center; margin:auto; width:50%;">
        <span style  ="font-size:1.3em;">Calendário Acadêmico</span>
      </div>

    </div>

  </div>

  <div style = "padding-top:3%;">

    <ul>

      <li><span style = "font-weight:bold; font-size:120%;" >Link para o calendário atual:</span>

      <li><a href = "#">Calendário atual</a></li>
      </br>

      <li><span style = "font-weight:bold; font-size:120%;" >Horários de cada sala:</span></li>

      <li><a href = #>Horários sala 1</a></li>

      <li><a href = #>Horários sala 2</a></li>

      <li><a href = #>Horários sala 3</a></li>

      <li><a href = #>Horários sala 4</a></li>

      </br>

      <li> <a href = "/calendario/edit2" class="deletar btn btn-primary"> Atualizar dados</a> <a href ="#" class="deletar btn btn-primary"> Deletar</a> </li>

    </ul>
  </div>

@endsection

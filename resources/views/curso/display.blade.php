@extends('layouts.main')
@section('title', 'Sobre')
@section('content')
<!--
'nome',
'turno',
'carga_horaria',
'sigla',
'analytics',
'calendario',
'horario',
-->
  <style>


    .bloco1{
      text-align:left;
      margin:40px;
      padding-bottom:20px;
      border-bottom: 1px solid gray;
    }
    /*bloco principal*/
    .bloco2{
        padding:20px 10% 0px 10%;
    }

    .bloco3{
      text-align:center;
      border-bottom:1px solid #d3d3d3;
      padding-top:17px;
      padding-bottom:17px;
      margin-bottom:17px;
    }

    .bloco4{
      display:flex;
      flex-direction:column;
      justify-content:center;
      align-items:left;
      margin:0px 40px;

      color:white;
      font-size:120%;
      text-shadow:0.3px 0.3px;
    }
    .bloco41{
      flex:1 1 0;
      border-radius:3px;
      border:1px solid gray;
    }

    .title{
      font-weight:bold;
      font-size:20px;
    }
    .title2{
      font-size:25px;
    }


</style>

    <div class="custom-container">
        <div>
            <div>
                <h3 class="title2">Sobre o curso </h3>
            </div>
        </div>
    </div>

    <div class = "bloco2">

        <div class = "bloco1">
            <span class = "title">Objetivos do curso {{$curso->nome}}</span>
            <p>No curso de Ciências da Computação o aluno desenvolverá as habilidades necessárias para...</p>
        </div>

        <div class = "bloco1"> <span class = "title">Matriz curricular</span>
            <p>O curso de Ciências da Computação do IFNMG contém em sua grade matérias voltadas para o desenvolvimento profissionalizante...</p>
            <a href = "#">link para o documento sobre a matriz curricular</a>
        </div>

        <div class = "bloco1"> <span class = "title">Calendário acadêmico</span>
            <p>Veja o calendário acadêmico no link</p>
            <a href = "#">calendário acadêmico</a>
        </div>



        <div class = "bloco1">
            <span class = "title">Carga horária do curso:</span>
            <p>{{$curso->carga_horaria}} horas .</p>

            <span class = "title">Turno:</span>
            <p>{{$curso->turno}}.</p>
        </div>

    </div>

    <div class="text-center mt-4">
        <a href="{{ url()->previous() }}" class="btn custom-button custom-button-castastrar-tcc btn-default">Voltar</a>
    </div>


@endsection

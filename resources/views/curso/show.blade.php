@extends('layouts.main')
@section('title', 'Sobre')
@section('content')

  <style>


    .bloco1{
      text-align:left;
      margin:40px;
      padding-bottom:20px;
      border-bottom: 1px solid gray;
    }
    /*bloco principal*/
    .bloco2{
        padding:0px 10% 0px 10%;
    }
/*
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
*/
    .title{
      font-weight:bold;
      font-size:20px;
    }
    .title2{
      font-size:24px;
    }
    .title3{
      font-size:24px;
      font-weight:bold;
    }

    .bloco5{

      text-align:center;
      min-width:100%;
      min-height:64px;
      text-shadow: 0.6px 0.6px 0.3px gray;
      padding:30px 0px 30px 0px;
      background-image:linear-gradient(to bottom,#d3d3d3,rgba(28,44,79,0));
    }


    .bloco6{
      display:flex;
      flex-direction:column;

      border-left: 8px solid #d3d3d3;
      border-right:8px solid #d3d3d3;


      border-radius:5px;
      margin:0px;

    }

    .button{
        display:block;
        text-align:center;
        color:white;
        font-weight:bold;
        text-decoration:none;
        border-radius:30px;
        margin:0px 40px 0px 0px;
        width:30%;
        height:100%;
        padding:16px;
        background-color:green;
        font-size:110%;
    }

    .button:hover{
        background-color:#198754;
    }

    .borda{
      padding-left:8px;
      padding-right:8px;
      margin-bottom:8px;
      border:1px solid gray;
      border-radius:6px;
    }
    .borda2{
      display:block;
      border-bottom:0.5px solid #d3d3d3;
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
        <div class = "bloco6">

            <div class = "bloco5">
                <span class = "title3">Conheça o curso {{$curso->nome}}, do Instituto Federal do Norte de Minas</span>
            </div>
            <div class = "bloco1">
                <div style = "text-align:center;">
                  <span class = "title">O que é o curso {{$curso->nome}}</span>
                </div>
                <br>
                <p>O curso de {{$curso->nome}}, fundado no ano de 2013 (...). No curso de bacharelado em Ciências da Computação o aluno desenvolverá as habilidades necessárias para (...) se profissionalizar e trabalhar em áreas como (...) </p>
                <br>
                <span> Nas últimas avaliações realizadas pelo MEC os resultados obtidos foram: </span>
</p>
    <ul>
        <li> Quatro na avaliação in loco –SINAES </li>
        <li> Quatro no ENADE </li>
    </ul>

            </div>

            <div class = "bloco1">
              <span class = "title">Matriz curricular</span>
                <p>O curso de Ciências da Computação do IFNMG contém em sua grade matérias voltadas para o desenvolvimento profissionalizante...</p>
                <a href = "#">link para o documento sobre a matriz curricular</a>
                <br>
                <br>
                <br>
                <span class = "title">Calendário acadêmico</span>
                <p>Veja o calendário acadêmico no link</p>
                <a href = "#">calendário acadêmico</a>
            </div>


            <div class = "bloco5">
                  <span class = "title3">Informações gerais</span>
            </div>

            <div class = "bloco1">

                <div class="borda">
                  <span class = "title borda2">Tempo para integração do curso</span>
                  <p>O tempo mínimo necessário para concluir o curso é de cinco anos (10 semestres) e o tempo máximo é de sete anos e meio (15 semestres)</p>
                </div>

                <div class = "borda">
                  <span class = "title borda2">Modalidade</span>
                  <p>Presencial</p>
                </div>

                <div class = "borda">
                  <span class = "title borda2">Turno</span>
                  <p>{{$curso->turno}}.</p>
                </div>

                <div class = "borda">
                  <span class = "title borda2">Tipo</span>
                  <p>Bacharelado</p>
                </div>

                <div class = "borda">
                  <span class = "title borda2">Carga horária do curso</span>
                  <p>{{$curso->carga_horaria}} horas .</p>
                </div>

                <br>
                <br>

                <span class = "title">Mais informações</span>
                <br>
                <a href = "#">analytics</a>
            </div>

            <div class = "bloco5">
                  <span class = "title3">Deseja se inscrever no curso?</span>
            </div>


            <div class = "bloco1" style="flex:1;">

                <span class = "title">Total de vagas ofertadas anualmente</span>
                <p>São ofertadas 40 vagas anualmente.</p>
                <br>

                <span class = "title">Total de vagas ofertadas por turma</span>
                <p>São ofertadas 40 vagas por turma.</p>
                <br>

                <span class = "title">Periodicidade de ingresso</span>
                <p>O ingresso no curso ocorre anualmente</p>
                <br>

                <span class = "title">Formas de acesso</span>
                <ul>
                    <li>Vestibular</li>
                    <li>SISU</li>
                </ul>
                <br>

                <span class = "title">Número de vagas disponibilizadas</span>
                <p>São ofertadas 40 vagas por turma.</p>
                <br>


                <a href = "https://www.ifnmg.edu.br/estude-no-ifnmg" class = "button">Estude no IFNMG</a>

            </div>



        </div>

    </div>

    <div class="text-center mt-4">
        <a href="{{ url()->previous() }}" class="btn custom-button custom-button-castastrar-tcc btn-default">Voltar</a>
    </div>
<!--
    - Nome do curso: Ciência da Computação
    - Modalidade: Presencial
    - Tipo: Bacharelado
    - Habilitação: Bacharel em Ciência da Computação
    - Ano de implantação: 2013
    - Ato de autorização: Portaria Nº 521-Reitor/2012
    - Total de vagas ofertadas anualmente: 40
    - Número de vagas ofertadas por turma: 40
    - Formas de acesso: Vestibular/SISU
    - Número de vagas disponibilizadas: 50%Vestibular e 50%SISU
    - Periodicidade de ingresso: Anual
    - Turno de funcionamento: Integral
    - Tempo para integralização do curso: Mínimo de cinco anos (10 semestres) e máximo de sete anos e meio (15 semestres)
    - Resultados obtidos nas últimas avaliações realizadas pelo MEC: ( Quatro (4) na avaliação in loco –SINAES; Nota quatro (4) no ENADE)
-->


@endsection

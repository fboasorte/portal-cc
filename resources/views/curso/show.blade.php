@extends('layouts.main')
@section('title', 'Sobre')
@section('content')

  <style>


    .bloco1{
      text-align:left;
      margin:40px;
      padding-bottom:20px;
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
      font-size:22px;
      font-weight:bold;
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
        min-width:120px;
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
      margin-bottom:2px;
      border:1px solid gray;
      border-radius:6px;
    }
    .borda2{
      display:block;
      border-bottom:0.5px solid #d3d3d3;
    }


    .bloco10{
      margin:0px 40px 0px 40px;
      display:flex;
      flex-direction:row;
      justify-content:space-evenly;
    }
        .blocos_pra_linha{
          display:flex;
          flex-direction:column;
          flex-wrap:wrap;
          flex:1;
        }
            .blocos_pra_linha1{
              border-bottom:1px solid gray;
              background-color:white;
              height:50%;
              flex:1;
            }
            .blocos_pra_linha2{
              background-color:white;
              height:50%;
              flex:1;
            }
        .bloco101{
          display:flex;
          align-items:center;
          padding:0px 5px 0px 5px;
          flex:1;
          overflow:hidden;

        }
    .nav{
      position:absolute;
      left:0;
      right:0;
      top:0;
      display:flex;
      height:auto;
      align-items:stretch;
    }
    .bloco_menu{
      flex:1;
      font-size:110%;
      text-align:center;
      font-weight:bold;
      min-height:100%;
      border:2px solid #d3d3d3;
      /*color:#325290;*/
      color:#1c2c4c;
      text-decoration:none;
    }
    .bloco_menu:hover{

      color: #324c81;

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

        <div class = "bloco6" style = "position:relative;">

          <nav class = "nav">
            <a href = "#o_que_e_o_curso" class = "bloco_menu">Conheça o curso</a>
            <a href = "#dados" class = "bloco_menu">Dados gerais</a>
            <a href = "#inscrever" class = "bloco_menu">Estude no IF</a>
          </nav>

          <div class = "bloco10">



              <div class = "bloco101">
                  <div style = "text-align:center; width:100%; margin-top:80px;">
                        <span class = "title3">Conheça o curso {{$curso->nome}}, do Instituto Federal do Norte de Minas</span>
                  </div>
              </div>



          </div>



            <div id="o_que_e_o_curso" class = "bloco1">

                <div style = "text-align:center;">
                    <span class = "title">O que é o curso {{$curso->nome}}</span>
                </div>

                <br>
                <p>O curso de {{$curso->nome}}, fundado no ano de 2013 (...). No curso de bacharelado em Ciências da Computação o aluno desenvolverá as habilidades necessárias para (...) se profissionalizar e trabalhar em áreas como (...) </p>
                <br>
                <span> Nas últimas avaliações realizadas pelo MEC os resultados obtidos foram: </span>

                <ul>
                    <li> Quatro na avaliação in loco –SINAES </li>
                    <li> Quatro no ENADE </li>
                </ul>

            </div>



            <div id = "dados" class = "bloco10">

                <div class = "blocos_pra_linha">
                    <div class = "blocos_pra_linha1"></div>
                    <div class = "blocos_pra_linha2"></div>
                </div>

                <div class = "bloco101">
                    <div style = "text-align:center; width:100%;">
                        <span class = "title3">Dados gerais do curso</span>
                    </div>
                </div>

                <div class = "blocos_pra_linha">
                    <div class = "blocos_pra_linha1"></div>
                    <div class = "blocos_pra_linha2"></div>
                </div>

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

                <div class = "borda">
                  <span class = "title borda2">Matriz curricular</span>
                    <p>
                      <a href = "#">link para o documento sobre a matriz curricular</a>
                    </p>
                </div>

                <div class = "borda">
                  <span class = "title borda2">Calendário acadêmico</span>
                    <p>
                        <a href = "#"> link para o calendário acadêmico</a>
                    </p>
                </div>

                <br>
                <br>

                <span class = "title">Mais informações</span>
                <br>
                <a href = "#">analytics</a>
            </div>



            <!--
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
            -->





            <div id = "inscrever" class = "bloco10">

                <div class = "blocos_pra_linha">
                    <div class = "blocos_pra_linha1"></div>
                    <div class = "blocos_pra_linha2"></div>
                </div>


                <div class = "bloco101">
                        <div style = "text-align:center; width:100%; ">
                            <span class = "title3">Deseja se matricular no curso?</span>
                        </div>
                </div>


                <div class = "blocos_pra_linha">
                    <div class = "blocos_pra_linha1"></div>
                    <div class = "blocos_pra_linha2"></div>
                </div>

            </div>







            <div class = "bloco1" style="flex:1;">

                <span class = "title">Total de vagas ofertadas anualmente</span>
                <p>São ofertadas 40 vagas anualmente.</p>


                <span class = "title">Total de vagas ofertadas por turma</span>
                <p>São ofertadas 40 vagas por turma.</p>


                <span class = "title">Periodicidade de ingresso</span>
                <p>O ingresso no curso ocorre anualmente</p>


                <span class = "title">Formas de acesso</span>
                <ul>
                    <li>Vestibular</li>
                    <li>SISU</li>
                </ul>


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

<script>


  let a = window.innerWidth;

  if(a < 600){

      const elementos =  document.getElementsByClassName("bloco10");
      const elementos2 =  document.getElementsByClassName("title3");

      const elementos3 = document.getElementsByClassName("bloco2");

      const elementos4 = document.getElementsByClassName("bloco1");
      const elementos5 = document.getElementsByClassName("bloco10");

      const elementos6 = document.getElementsByClassName("title");

      for (let i = 0; i < elementos.length; i++) {
        elementos[i].style.height = (window.innerWidth*1.6 - 3000) +"px";
      }

      for (let i = 0; i < elementos2.length; i++) {
        elementos2[i].style.fontSize = (window.innerWidth*0.032 + 5.5) +"px";
      }

      for (let i = 0; i < elementos3.length; i++) {
        elementos3[i].style.padding = "0px 1% 0px 1%";
      }

      for (let i = 0; i < elementos4.length; i++) {
        elementos4[i].style.margin = "40px 3% 40px 3%";
      }

      for (let i = 0; i < elementos5.length; i++) {
        elementos5[i].style.margin = "0px 3% 0px 3%";
      }

      for (let i = 0; i < elementos6.length; i++) {
        elementos6[i].style.fontSize = "16px";
      }

  }

</script>

@endsection

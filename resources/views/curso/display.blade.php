@extends('layouts.main')
@section('title', 'Sobre')
@section('content')



  <style>


    .bloco1{
      text-align:left;
      margin-left:30px;
      padding-bottom:20px;
    }
    /*bloco principal*/
    .bloco2{
        padding:0px 10% 60px 10%;
    }

    .bloco3{
      text-align:center;
      border-bottom:1px solid #d3d3d3;
      padding-top:17px;
      padding-bottom:17px;
      margin-bottom:17px;
    }

    .title{
      font-weight:bold;
      font-size:20px;
    }
    .title2{
      font-weight:bold;
      font-size:30px;
    }


</style>

    <div class = "bloco2">
        <div class = "bloco3">
            <h1 class = "title2">Sobre o curso:</h1>
        </div>
        <div class = "bloco1">
            <span class = "title">Objetivos do curso</span>
            <p>No curso de Ciências da Computação o aluno desenvolverá as habilidades necessárias para...</p>
        </div>
        <div class = "bloco1"> <span class = "title">Matriz curricular</span>
            <p>O curso de Ciências da Computação do IFNMG contém em sua grade matérias voltadas para o desenvolvimento profissionalizante...</p>
            <a href = "#">link para o documento sobre a matriz curricular</a>
        </div>
    </div>




@endsection

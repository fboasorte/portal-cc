@extends('layouts.main')
@section('title', 'gerenciar')
@section('content')

  <style>
  li{
    font-weight:bold;
    list-style-type:none;
    padding-top:0.1%;
    padding-bottom:0.1%;
  }

  #titulo-curso{
    background-color: #1c2c4c;
    color: #fff;
  }

  a{
    text-decoration:none;
  }


  .colocar-margem{
    margin-left:1%;
    margin-right:1%;
  }

  .colocar-margem-direita{
    margin-right:1%;
  }

  .borda{
    border: 1px solid #ccc;

  }

  </style>


  <div id = "titulo-curso" class="d-flex justify-content-between align-items-center py-2">

    <div style = "text-align:center; margin:auto; width:50%;">
      <div>
        <span class="post material-symbols-outlined " style = "font-size:190%;">
          face
        </span>
      </div>

      <span style  ="font-size:1.3em;">Cadastrando aluno</span>
    </div>

  </div>

  <div class="container mt-4">
      <form method="post" action="/" encytype = "multipart/form-data">
          @csrf

          <div class="mb-3">
              <label for="titulo" class="form-label"> <br>Digite o nome do aluno: </label>
              <input type="text" name="arquivo_matriz_"  class="borda form-control">
          </div>

          <div class="d-flex justify-content-center mt-4">
              <a href = "#"  class="colocar-margem custom-button-castastrar-tcc btn btn-danger btn-sm">Cancelar</a>
              <button type="submit" class="colocar-margem custom-button-castastrar-tcc btn btn-primary btn-sm">Cadastrar</button>
          </div>
      </form>
  </div>

@endsection

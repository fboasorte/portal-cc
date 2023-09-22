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
        padding-right:0.8%;

        border:none;
        background-color:#1c2c4c;
      }
      .colocar-margem{
        margin-left:1%;
        margin-right:1%;
      }

  </style>

  <div id = "titulo-calendario" class="d-flex justify-content-between align-items-center py-2">
    <div style = "text-align:center;  margin:auto; width:50%;">
      <span class="material-symbols-outlined"  style = "font-size:190%;"> calendar_month </span>

      <div style = "text-align:center; margin:auto; width:50%;">
        <span style  ="font-size:1.3em;">Calendário Acadêmico</span>
      </div>

    </div>

  </div>

  <div class="container mt-4">
      <form method="post" action="/" encytype = "multipart/form-data">
          @csrf
          <div class="mb-3">
              <label for="titulo" class="form-label"> <br>Arquivo da grade de horários: </label>
              <input type="file" name="arquivo_grade_de_horarios" class="form-control" required>
          </div>

          <div class="mb-3">
              <label for="titulo" class="form-label"> <br>Arquivo do calendário: </label>
              <input type="file" name="arquivo_do_calendario" class="form-control" required>
          </div>

          <div class="d-flex justify-content-center mt-4">
              <a href = "/calendario/edit1"  class="colocar-margem btn custom-button custom-button-castastrar-tcc">Cancelar</a>
              <button type="submit" class="colocar-margem btn custom-button custom-button-castastrar-tcc">Salvar</button>
          </div>
      </form>
  </div>


@endsection

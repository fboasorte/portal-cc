@extends('layouts.main')

@section('title', 'Editar aluno')

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
    <span style  ="font-size:1.3em;">Gerenciando aluno</span>
  </div>

</div>

<div class="container mt-4">
  <form method="get" action="/">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="nome" class="form-label">Digite o novo nome:</label> <br>
        <input type="text" name="nome" class="borda form-control" value="aluno">
      </div>

      <div class="d-flex justify-content-center mt-4">

        <a href="aluno/" class =" colocar-margem custom-button-castastrar-tcc btn btn-danger btn-sm">Cancelar</a>
        <button class = "colocar-margem custom-button-castastrar-tcc btn btn-primary btn-sm">Salvar</button>

      </div>

  </form>
</div>
@endsection

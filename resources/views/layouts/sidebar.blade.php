<!DOCTYPE html>
<html lang="pt-BR">

<div class="custom-container">
  <button class="openbtn" onclick="nav()"><i class="fa-solid fa-bars"></i></button>
  <div>
      <div>
        <i class="{{ $iconClass }} fa-2x"></i>
          <h3 class="smaller-font">{{ $title }}</h3>
      </div>
  </div>
  <div>
  </div>
</div>
<div id="mySidebar" class="sidebar">
  
  <a href="/aluno">Aluno</a>
  <a href="/banca">Banca</a>
  <a href="/professor">Professor</a>
  <a href="/professor-externo">Professor Externo</a>
  <a href="/postagem">Postagem</a>
  <a href="projeto">Projeto</a>
  <a href="/tcc">Tcc</a>
  <a href="/tipo-postagem">Tipo Postagem</a>

  
</div>


  
<script>
  /* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
  let status = false;

function nav(){

  let value = status ? '0' : '250px';
  document.getElementById("mySidebar").style.width = value;
  document.getElementById("main").style.marginLeft = value;
  status = !status;
}


</script>

</html>

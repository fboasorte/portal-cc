@extends('site/menu')
@section('title', 'cad_prof')
@section('content')

<div class="custom-container"> <!-- Container principal -->
    <div>
        <div>
            <i class="fas fa-graduation-cap fa-2x"></i> <!-- Ícone -->
            <h3 class="smaller-font">Cadastrar Professor</h3> <!-- Título -->
        </div>
    </div>
</div>

<div class="container mt-4"> <!-- Container secundário -->
    <style>
        /* .custom-textarea {
            width: 650px; 
            height: 100px; 
        } */
        
        .btn-mr {
            margin-right: 15px; /* Ajuste o valor conforme necessário para controlar o espaçamento */
        }   
    </style>
</div>


<div class="container mt-4">
    <form method="post">
        <!-- forms precisa ter os seguintes campos: texto, dropdown com tipo, anexo de imagens, e anexo de arquivos -->
        <div class="row">
            <div class="col-md-6">
                <!-- Nome Completo à esquerda -->
                <div class="form-group">
                    <label for="titulo" class="form-label"><br>Nome Completo*:</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Nome Completo" required>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Email à direita -->
                <div class="form-group">
                    <label for="email" class="form-label"><br>Email:*</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                </div>
            </div>
        </div>

                <div class="form-group">
                    <label for="texto" class="form-label"><br>Descrição:</label>
                    <textarea name="texto" id="texto" class="form-control" placeholder="Descrição do Professor" required></textarea>
                </div>
        
                <div class="form-group">
                    <label for="atuacao" class="form-label"><br>Área de Atuação*:</label>
                    <select name="atuacao" id="atuacao" class="form-control" required>
                        <option value="area1">Selecione...</option>
                        <option value="area2">Ciência Da Computação</option>
                        <option value="area3">Engenharia de Sistemas</option>
                        <option value="area4">Sistemas de Informação</option>
                        <option value="area5">Engenharia Química</option>
                    </select>
                </div>

                <div class="form-group">    
                    <label for="lattes" class="form-label"><br>Currículo Lattes:</label>
                    <input type="text" class="form-control" id="lattes" placeholder="Link do Lattes" required>
                </div>





                <div class="form-group">    
                    <label for="pagina" class="form-label"><br>Página Pessoal:</label>
                    <input type="text" class="form-control" id="pagina" placeholder="Link da Página" required>
                </div>

                <div class="form-group">
                    <label for="imagem" class="form-label"><br>Foto Perfil:</label>
                    <input type="file" name="imagem" id="imagem" class="form-control">
                </div>

        
        <!-- botão cancelar com margem a direita, usando opção "secondary" pra ficar cinza -->
        <br>
        <button type="submit" class="btn btn-secondary btn-mr">Cancelar</button>
        <button type="submit" class="btn btn-primary btn-cadastrar">Cadastrar</button>

    </form>
</div>



@endsection

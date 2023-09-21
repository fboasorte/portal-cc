@extends('site/menu')
@section('title', 'lista_profs')
@section('content')

<div class="custom-container"> <!-- Container principal -->
    <div>
        <div>
            <i class="fas fa-graduation-cap fa-2x"></i> <!-- Ícone -->
            <h3 class="smaller-font">Professores Cadastrados</h3> <!-- Título -->
        </div>
    </div>
</div>

<div class="container mt-4"> <!-- Container secundário -->
    <style>
        /* Estilos para a formatação da lista */
        .professor {
            display: inline-block;
            width: 14%; /* Cada professor ocupa 25% da largura da tela */
            text-align: center;
            margin-bottom: 40px;
            margin: 40px;
            position: relative; /* Para posicionar os botões */
            /* border: 1px solid blue; 
            background-color: rgb(225, 225, 198); */
        }

        /* Estilos para a imagem do professor */
        .professor img {
            max-width: 100%;
            border-radius: 10%;
            /* border: 1px solid blue;  */
        }

        /* Estilos para os botões */
        .edit-button, .remove-button {
            position: relative;
            bottom: 10px;
            width: 80px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .remove-button {
            background-color: #dc3545;
            left: 10px;
        }
    </style>
</div>


<!-- <div class="container"> -->
<div class="row">
    <div class="col-md-32 mx-auto"> <!-- coluna 32 e auto ajuste -->

        <!-- Linha 1 -->
        <div class="professor">
            <img src="{{ asset('images/foto_professor.jpg') }}" alt="Professor 1">
            <h2>Professor 1</h2>
            <p>Área: Matemática</p>
            <button class="edit-button">Editar</button>
            <button class="remove-button">Remover</button>

        </div>

        <div class="professor">
            <img src="{{ asset('images/foto_professor.jpg') }}" alt="Professor 2">
            <h2>Professor 2</h2>
            <p>Área: Banco de Dados</p>
            <button class="edit-button">Editar</button>
            <button class="remove-button">Remover</button>
        </div>

        <div class="professor">
            <img src="{{ asset('images/foto_professor.jpg') }}" alt="Professor 3">
            <h2>Professor 3</h2>
            <p>Área: Estatística</p>
            <button class="edit-button">Editar</button>
            <button class="remove-button">Remover</button>
        </div>

        <div class="professor">
            <img src="{{ asset('images/foto_professor.jpg') }}" alt="Professor 4">
            <h2>Professor 4</h2>
            <p>Área: Web</p>
            <button class="edit-button">Editar</button>
            <button class="remove-button">Remover</button>
        </div>

        <!-- Linha 2 -->
        <div class="professor">
            <img src="{{ asset('images/foto_professor.jpg') }}" alt="Professor 5">
            <h2>Professor 5</h2>
            <p>Área: Área de atuação</p>
            <button class="edit-button">Editar</button>
            <button class="remove-button">Remover</button>
        </div>

        <div class="professor">
            <img src="{{ asset('images/foto_professor.jpg') }}" alt="Professor 6">
            <h2>Professor 6</h2>
            <p>Área: Área de atuação</p>
            <button class="edit-button">Editar</button>
            <button class="remove-button">Remover</button>
        </div>

        <div class="professor">
            <img src="{{ asset('images/foto_professor.jpg') }}" alt="Professor 7">
            <h2>Professor 7</h2>
            <p>Área: Área de atuação</p>
            <button class="edit-button">Editar</button>
            <button class="remove-button">Remover</button>
        </div>

        <div class="professor">
            <img src="{{ asset('images/foto_professor.jpg') }}" alt="Professor 8">
            <h2>Professor 8</h2>
            <p>Área: Área de atuação</p>
            <button class="edit-button">Editar</button>
            <button class="remove-button">Remover</button>
        </div> 

    </div>
</div>



@endsection

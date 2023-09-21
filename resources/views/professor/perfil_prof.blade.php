@extends('site/menu')
@section('title', 'Perfil Prof')
@section('content')

<div class="custom-container"> <!-- Container principal -->
    <div>
        <div>
            <i class="fas fa-graduation-cap fa-2x"></i> <!-- Ícone -->
            <h3 class="smaller-font">Perfil Professor</h3> <!-- Título -->
        </div>
    </div>
</div>

<div class="container mt-4"> 
    <style>
        /* Estilos para a imagem da pessoa */
        .pessoa-foto {
            width: 300px;
            height: auto;
            margin-right: 20px;
            display: block; /* Certifica-se de que a imagem seja exibida como um bloco */
            margin-left: auto; /* Centraliza a imagem à esquerda automaticamente */
            margin-right: auto; /* Centraliza a imagem à direita automaticamente */
            /* margin-top: 30px; */
        }

        .btn-mr {
            margin-right: 15px; /* Ajuste o valor conforme necessário para controlar o espaçamento */
            margin-left: 55px;
        }

        .profile-info {
            flex-grow: 1;
            margin-top: 15px;
            margin-left: 55px;
        }

        /* Estilos para a seção de informações 
        .info {
            flex: 1;
            float: left; 
        }*/

        .info h1 {
            font-size: 24px;
            margin-bottom: 10px;
            margin-top: 30px;
        }

        .info h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .info p {
            font-size: 16px;
            line-height: 1.5;
        }

    </style>
</div>

<div class="container">
    <div class="row">

            <div class="col-md-4">
                    <img src="{{ asset('images/foto_professor.jpg') }}" alt="Foto da Pessoa" class="pessoa-foto">
                
                        <div class="card-body">
                            <p class="profile-info">Email: <a href="mailto:email@example.com">email@example.com</a></p>
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="btn-group">
                                    <a href="perfil_prof" class="btn btn-sm btn-outline-secondary btn-mr">Lattes</a>
                                </div>
                                <div class="btn-group">
                                    <a href="perfil_prof" class="btn btn-sm btn-outline-secondary mr-10">Página Pessoal</a>
                                </div>
                            </div>
                        </div>
                    </img>
            </div>   
            
            
            <div class="col-md-8">                
                    <h1>Nome da Pessoa</h1>
                    <h2>Área de Atuação</h2>
                    <p class="text-right">Descrição sobre a pessoa aqui. Esta é uma descrição de exemplo que você pode substituir pelo conteúdo real. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit lorem.</p>
            </div>
    </div>
</div>



@endsection

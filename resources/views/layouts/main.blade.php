<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">



    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <style>
        footer {
            position: fixed bottom;
            margin-top: 240px;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #1c2c4c;
            color: white;
            padding: 10px;
            text-align: center;   
        }
    </style>


</head>

<body>
    @if(auth()->check())
        @include('layouts.authenticated-header') 
    @else
        @include('layouts.header')
    @endif
    

    @include('layouts.flash-message')

    <div class="navbar-divider"></div>

    <div class="container2">
        @yield('content')
    </div>


    <footer>
        <p>&copy; 2023 Departamento de Ciência da Computação - IFNMG - Todos os direitos reservados</p>
        <p>Endereço: Rua Dois, 300 - Village do Lago I - Montes Claros - MG – CEP 39.404-058</p>
        <p>Telefone: (38) 2103-4141</p>
        <p>E-mail: <a href="mailto:comunicacao.montesclaros@ifnmg.edu.br">comunicacao.montesclaros@ifnmg.edu.br</a></p>
        <p>Página eletrônica: <a href="https://www.ifnmg.edu.br/montesclaros">www.ifnmg.edu.br/montesclaros</a></p>

        
    
    </footer>


</body>

</html>

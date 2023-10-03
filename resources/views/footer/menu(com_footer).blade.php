<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    <title>@yield('title', 'Menu')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <style>
        footer {
            position: fixed bottom;
            margin-top: 20px;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #1c2c4c;
            color: white;
            padding: 10px;
            text-align: center;
            
        }

            .map-responsive{
                overflow:hidden;
                padding-bottom:56.25%;
                position:relative;
                height:0;
        }

            .map-responsive iframe{
                left:0;
                top:0;
                height:100%;
                width:100%;
                position:absolute;
        }
    </style>

</head>

<body>
    <header class="header-1">
        <div class="container-1">
            <div class="d-flex justify-content-between align-items-center py-2">
                <div>
                    <span class="fs-6">INSTITUTO FEDERAL DO NORTE DE MINAS GERAIS</span>
                </div>
                <div>
                    <a href="{{ route('login') }}" class="text-white text-decoration-none me-2">Login</a>
                    <span class="separator">|</span>

                    <span class="search-icon" id="search-icon">
                        <i class="fas fa-search"></i>
                    </span>

                    <div class="search-input" id="search-input">
                        <input type="text" placeholder="Pesquisar">
                        <span class="close-icon" id="close-icon">
                            <i class="fas fa-times"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-2">
            <nav class="navbar navbar-expand-lg bg-white custom-navbar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('images/logo-criada.png') }}" alt="Ciência da Computação" class="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse custom-navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ms-auto">

                            <li class="nav-item dropdown dropdown-item-custom">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Curso
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item " href="#">Opção 1</a></li>
                                    <li><a class="dropdown-item" href="#">Opção 2</a></li>
                                    <li><a class="dropdown-item" href="#">Opção 3</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown dropdown-item-custom">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Notícias
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Opção 1</a></li>
                                    <li><a class="dropdown-item" href="#">Opção 2</a></li>
                                    <li><a class="dropdown-item" href="#">Opção 3</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown dropdown-item-custom">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Pesquisa
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Opção 1</a></li>
                                    <li><a class="dropdown-item" href="#">Opção 2</a></li>
                                    <li><a class="dropdown-item" href="#">Opção 3</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown dropdown-item-custom">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    TCC
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Opção 1</a></li>
                                    <li><a class="dropdown-item" href="#">Opção 2</a></li>
                                    <li><a class="dropdown-item" href="#">Opção 3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

    </header>

    <div id="message"></div>

    <div class="navbar-divider"></div>

    <div class="container2">
        @yield('content')
    </div>


    <script>
        const searchIcon = document.getElementById('search-icon');
        const searchInput = document.getElementById('search-input');
        const closeIcon = document.getElementById('close-icon');
        const message = document.getElementById('message');

        searchIcon.addEventListener('click', () => {
            if (searchInput.classList.contains('active') && searchInput.querySelector('input').value.trim() !== '') {
                message.textContent = 'Você digitou: "' + searchInput.querySelector('input').value.trim() + '"';

                // Adicionar aqui página para busca

            } else if (!searchInput.classList.contains('active')) {
                searchInput.classList.add('active');
            }
        });

        closeIcon.addEventListener('click', () => {
            searchInput.classList.remove('active');
        });
    </script>


    <footer>
        <p>&copy; 2023 Departamento de Ciência da Computação - IFNMG - Todos os direitos reservados</p>
        <p>Endereço: Rua Dois, 300 - Village do Lago I - Montes Claros - MG – CEP 39.404-058</p>
        <p>Telefone: (38) 2103-4141</p>
        <p>E-mail: <a href="mailto:comunicacao.montesclaros@ifnmg.edu.br">comunicacao.montesclaros@ifnmg.edu.br</a></p>
        <p>Página eletrônica: <a href="https://www.ifnmg.edu.br/montesclaros">www.ifnmg.edu.br/montesclaros</a></p>

        <iframe src="https://www.google.com/maps/search/ifnmg/@-16.6885031,-43.8330999,15.81z?entry=ttu" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

    
    </footer>

</body>

</html>
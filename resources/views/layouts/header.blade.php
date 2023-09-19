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

<script>
    const searchIcon = document.getElementById('search-icon');
    const searchInput = document.getElementById('search-input');
    const closeIcon = document.getElementById('close-icon');
    const message = document.getElementById('message');

    searchIcon.addEventListener('click', () => {
        if (searchInput.classList.contains('active') && searchInput.querySelector('input').value.trim() !== '') {
            //message.textContent = 'Você digitou: "' + searchInput.querySelector('input').value.trim() + '"';

            // Adicionar aqui a busca

        } else if (!searchInput.classList.contains('active')) {
            searchInput.classList.add('active');
        }
    });

    closeIcon.addEventListener('click', () => {
        searchInput.classList.remove('active');
    });
</script>
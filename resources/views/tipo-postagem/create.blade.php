<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Postagem</title>
    <link rel="stylesheet" href="{{ URL::asset('css/estilo.css'); }}">
    <link rel="stylesheet" href="{{ URL::asset('css/padrao.css'); }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <header class="header">
        <h2 class="texto_header">Gerenciar Tipo de Postagem</h2>
        <span class="post material-symbols-outlined ">
            contract
        </span>
    </header>

    <form method="post" action="{{ route('create_tipo_postagem') }}">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do tipo de postagem" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>

    </form>
</body>
@extends('layouts.main')

@section('title', 'Criar Tipo de Postagem')

@section('content')
    <div class="custom-container">
        <div>
            <div>
                <i class="fas fa-graduation-cap fa-2x"></i>
                <h3 class="smaller-font">Gerenciar Postagem</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <form method="post" action="{{ route('tipo-postagem.store') }}">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input value="{{ old('nome') }}" type="text" name="nome" id="nome"
                    placeholder="Nome do tipo de postagem" required
                    class="form-control @error('nome') is-invalid @enderror">

                @error('nome')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn custom-button btn-default">Cadastrar</button>
            <a href="{{ route('tipo-postagem.index') }} "
                class="btn custom-button custom-button-castastrar-tcc btn-default">Cancelar</a>

        </form>
    </div>
@stop

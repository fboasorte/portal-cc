@extends('layouts.main')
@section('title', 'Ciência da Computação')
@section('content')

<div class="container mt-5">
    <div class="card">
        @if (count($postagem->imagens) > 0)
        @foreach ($postagem->imagens as $img)
        @if (Storage::disk('public')->exists($img->imagem))
        <img src="{{ URL::asset('storage') }}/{{ $img->imagem }}" alt="{{ $postagem->titulo }}" class="card-img-top">
        @endif
        @endforeach
        @endif

        <div class="card-body">
        <h2 class="card-title">{{ $postagem->titulo }}</h2>
            <div class="mb-4"></div>
            <p class="card-text">{{ $postagem->texto }}</p>
        </div>
    </div>
</div>

@endsection

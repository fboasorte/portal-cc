@extends('layouts.main')
@section('title', 'Ciência da Computação')
@section('content')

<div class="container mt-5">
    <div class="card">
        @if (count($postagem->imagens) > 0)
            @php $firstImage = $postagem->imagens[0]; @endphp
            @if (Storage::disk('public')->exists($firstImage->imagem))
                <img src="{{ URL::asset('storage') }}/{{  $firstImage->imagem }}" alt="{{ $postagem->titulo }}" class="card-img-top">
            @endif
        @endif
        
        <div class="card-body">
            <h2 class="card-title">{{ $postagem->titulo }}</h2>
            <div class="mb-4"></div>
            <p class="card-text">{{ $postagem->texto }}</p>
        </div>
    </div>
</div>

@endsection
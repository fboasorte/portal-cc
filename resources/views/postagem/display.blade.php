@extends('layouts.main')
@section('title', 'Ciência da Computação')
@section('content')

@php
$imagensPostagens = [];
foreach ($postagens as $postagem) {
    $firstImage = $postagem->imagens->first();
    if ($firstImage && Storage::disk('public')->exists($firstImage->imagem) && $postagem->menu_inicial) {
        $imagensPostagens[] = [
            'postagem' => $postagem,
            'imagem' => $firstImage,
        ];
    }
}
@endphp

<div id="demo" class="container carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
    <div class="carousel-indicators" id="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        @foreach ($imagensPostagens as $index => $item)
        <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $index + 1}}"></button>
        @endforeach
    </div>

    <div class="carousel-inner" id="carousel-inner">
        <div class="carousel-item active">
            <a href="{{ route('tcc.display')}}">
                <img src="{{ asset('images/convite_tcc.png') }}" alt="Image 1" class="carousel-image w-100 max-height-carousel">
            </a>
        </div>

        @foreach ($imagensPostagens as $index => $item)
        <div class="carousel-item">
            <a href="{{ route('postagem.show', ['id' => $item['postagem']->id]) }}">
                <img src="{{ URL::asset('storage') }}/{{ $item['imagem']->imagem }}" alt="Image {{ $index + 1 }}" class="carousel-image w-100 max-height-carousel">
            </a>
        </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<br>

<div class="container mt-5">
    <h3 class="text-left">Postagens Computação:</h3>
</div>

<div class="album py-3 library">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($postagens as $postagem)
            <div class="col">
                <div class="card shadow-sm">
                    @if (count($postagem->imagens) > 0)
                    @php $firstImage = $postagem->imagens[0]; @endphp
                    @if (Storage::disk('public')->exists($firstImage->imagem) && $postagem->menu_inicial )
                    <a href="{{ route('postagem.show', ['id' => $postagem->id]) }}">
                        <img src="{{ URL::asset('storage') }}/{{ $firstImage->imagem }}" alt="{{ $postagem->titulo }}" class="bd-placeholder-img card-img-top" width="100%">
                    </a>
                    @else
                    <a href="{{ route('postagem.show', ['id' => $postagem->id]) }}">
                        <img src="{{ asset('images/postagem.png') }}" alt="{{ $postagem->titulo }}" class="bd-placeholder-img card-img-top" width="100%">
                    </a>
                    @endif
                    @else
                    <a href="{{ route('postagem.show', ['id' => $postagem->id]) }}">
                        <img src="{{ asset('images/postagem.png') }}" alt="{{ $postagem->titulo }}" class="bd-placeholder-img card-img-top" width="100%">
                    </a>
                    @endif

                    <div class="card-body">
                        <p class="card-text">{{ $postagem->titulo }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('postagem.show', ['id' => $postagem->id]) }}" class="btn btn-sm btn-outline-secondary">Visualizar</a>
                            </div>
                            <small class="text-body-secondary">{{ $postagem->created_at->format('d/m/Y H:i') }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
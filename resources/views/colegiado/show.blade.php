@extends('layouts.main')
@section('title', 'Colegiado')
@section('content')

<div class="custom-container">
    <div>
        <div>
            <i class="fas fa-chalkboard fa-2x"></i>
            <h3 class="smaller-font">Colegiado</h3>
        </div>
    </div>
</div>
<br>
<div class="event-schedule-area-two bg-color pad100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                        <div class="table-responsive">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item nav-item-colegiado" role="presentation">
                                    <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-selected="true">Detalhes</a>
                                </li>
                                <li class="nav-item nav-item-colegiado" role="presentation">
                                    <a class="nav-link" id="professores-tab" data-toggle="tab" href="#professores" role="tab" aria-selected="true">Professores</a>
                                </li>
                                <li class="nav-item nav-item-colegiado" role="presentation">
                                    <a class="nav-link" id="ata-tab" data-toggle="tab" href="#ata" role="tab" aria-selected="true">Ata</a>
                                </li>
                                <!-- Adicione mais abas para outras categorias de detalhes -->
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                                    @if ($colegiado)
                                    <p><strong>Número de Portaria:</strong> {{ $colegiado->numero_portaria }}</p>
                                    <p><strong>Início:</strong> {{ date('d/m/Y', strtotime($colegiado->inicio)) }}</p>
                                    <p><strong>Fim:</strong> {{ date('d/m/Y', strtotime($colegiado->fim)) }}</p>
                                    <p><strong>Coordenador:</strong> {{ $presidente->servidor->nome }}</p>
                                    <p><strong>Arquivo de Portaria:</strong> <a download href="{{ asset('storage') }}/{{ $colegiado->arquivoPortaria->path }}">Download
                                            portaria Nº {{ $colegiado->numero_portaria }}</a></p>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="professores" role="tabpanel" aria-labelledby="professores-tab">
                                    <ul style="list-style-type: none; padding: 0;">
                                        @if ($professores)
                                        <p><strong>Nome:</strong></p>
                                        @foreach ($professores as $professor)
                                        <li>{{ $professor->servidor->nome }}</li>
                                        <!-- Adicione mais detalhes do professor, se necessário -->

                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="ata" role="tabpanel" aria-labelledby="ata-tab">
                                    <ul style="list-style-type: none; padding: 0;">
                                        @foreach ($atas as $ata)
                                        <li>
                                            <strong>Data:</strong> {{ date('d/m/Y', strtotime($ata->data)) }}
                                            <button class="btn btn-primary show-description-btn">Mostrar Descrição</button>
                                            <p class="description" style="display: none;">
                                                <strong>Descrição:</strong> {{ $ata->descricao }}
                                            </p>
                                        </li>
                                        <br>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- Adicione mais abas e conteúdo correspondente conforme necessário para outras categorias de detalhes -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('professores-tab').addEventListener('click', function(e) {
        e.preventDefault(); // Impede que a aba ative a alteração da URL
        document.getElementById('details').classList.remove('show', 'active');
        document.getElementById('ata').classList.remove('show', 'active');
        document.getElementById('professores').classList.add('show', 'active');
        document.getElementById('professores-tab').classList.add('active');
        document.getElementById('ata-tab').classList.remove('active');
        document.getElementById('details-tab').classList.remove('active');
    });

    document.getElementById('details-tab').addEventListener('click', function(e) {
        e.preventDefault(); // Impede que a aba ative a alteração da URL
        document.getElementById('professores').classList.remove('show', 'active');
        document.getElementById('ata').classList.remove('show', 'active');
        document.getElementById('details').classList.add('show', 'active');
        document.getElementById('details-tab').classList.add('active');
        document.getElementById('ata-tab').classList.remove('active');
        document.getElementById('professores-tab').classList.remove('active');
    });

    document.getElementById('ata-tab').addEventListener('click', function(e) {
        e.preventDefault(); // Impede que a aba ative a alteração da URL
        document.getElementById('details').classList.remove('show', 'active');
        document.getElementById('professores').classList.remove('show', 'active');
        document.getElementById('ata').classList.add('show', 'active');
        document.getElementById('ata-tab').classList.add('active');
        document.getElementById('professores-tab').classList.remove('active');
        document.getElementById('details-tab').classList.remove('active');
    });

    const showDescriptionButtons = document.querySelectorAll('.show-description-btn');

    showDescriptionButtons.forEach(button => {
        button.addEventListener('click', function() {
            const description = this.nextElementSibling;
            if (description.style.display === 'none') {
                description.style.display = 'block';
                this.textContent = 'Ocultar Descrição';
            } else {
                description.style.display = 'none';
                this.textContent = 'Mostrar Descrição';
            }
        });
    });
</script>


@endsection
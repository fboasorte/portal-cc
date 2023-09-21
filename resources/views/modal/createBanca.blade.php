<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="modal fade" id="createBanca" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar banca</h5>
                <button type="button" class="close btn btn-lg" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="data">Data da banca</label>
                    <input type="date" name="data" id="data" class="form-control" required>
                    <label for="local">Local</label>
                    <input type="text" name="local" id="local" class="form-control" placeholder="Local da banca" required>

                    <div class="form-group">
                        <label for="professores">Professores internos</label>

                        @foreach ($professores as $professor_interno)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="professores_internos[]" id="{{$professor_interno->id}}" value="{{$professor_interno->id}}">
                            <label for="" class="form-check-label">{{$professor_interno->nome}} </label>
                        </div>
                        @endforeach
                        <a href="" class=" modal-trigger" data-bs-toggle="modal" data-bs-target="#createProfessor" >Cadastrar profesor interno</a>
                    </div>
                    <div class="form-group">
                        <label for="professores">Professores externos</label>

                        @foreach ($professores_externos as $professor_externo)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="professores_externos[]" id="{{$professor_externo->id}}" value="{{$professor_externo->id}}">
                            <label for="" class="form-check-label">{{$professor_externo->nome}} - {{$professor_externo->filiacao}}</label>
                        </div>
                        @endforeach
                        <a href="" class=" modal-trigger" data-bs-toggle="modal" data-bs-target="#createProfessorExterno" >Cadastrar profesor externo</a>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn custom-button" data-dismiss="modal" id="cadastrarBancaButton">Cadastrar</button>
            </div>
        </div>
    </div>
</div>

<script>
      $(document).ready(function() {
        $('#cadastrarBancaButton').click(function() {
            var data = $('#data').val();
            var local = $('#local').val();

            var professoresInternos = [];
            $('input[name="professores_internos[]"]:checked').each(function() {
                professoresInternos.push($(this).val());
            });

            var professoresExternos = [];
            $('input[name="professores_externos[]"]:checked').each(function() {
                professoresExternos.push($(this).val());
            });

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            var data = {
                _token: csrfToken,
                data: data,
                local: local,
                professores_internos: professoresInternos,
                professores_externos: professoresExternos,
                contexto: 'modal'
            };

            $.ajax({
                type: 'POST',
                url: "{{ route('banca.store') }}", // Substitua pela sua rota
                data: data,
                success: function(response) {
                    alert('Banca cadastrada com sucesso!');
                },
                error: function(error) {
                    alert('Ocorreu um erro ao cadastrar a banca.');
                }
            });
        });
    });
</script>

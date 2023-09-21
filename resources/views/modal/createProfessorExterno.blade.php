<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="modal fade" id="createProfessorExterno" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar aluno</h5>
                <button type="button" class="close btn btn-lg" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome-professor-externo" id="nome-professor-externo" class="form-control" placeholder="Nome do professor externo" required>
                    <label for="filiacao">Filiação</label>
                    <input type="text" name="filiacao" id="filiacao" class="form-control" placeholder="Nome da instituição de filiação" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn custom-button" data-dismiss="modal" id="cadastrarProfessoExternoButton">Cadastrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#cadastrarProfessoExternoButton').click(function() {
            var nome = $('#nome-professor-externo').val();
            var filiacao = $('#filiacao').val();

            if (nome.trim() === '' || filiacao.trim() === '') {
                alert('Por favor, preencha todos os campos.');
                return;
            }

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            var data = {
                _token: csrfToken,
                nome: nome,
                filiacao: filiacao,
                contexto: 'modal'
            };

            $.ajax({
                type: 'POST',
                url: "{{ route('professor-externo.store') }}",
                data: data,
                success: function(response) {
                    $('#createProfessorExterno').modal('hide');
                    atualizarProfessoresExternos();
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });

        function atualizarProfessoresExternos() {
            $.ajax({
                type: 'GET',
                url: "{{ route('professor-externo.index', ['contexto' => 'modal']) }}",
                success: function(response) {
                    console.log(response);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }
    });
</script>

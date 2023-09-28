<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="modal fade" id="createProfessor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar professor</h5>
                <button type="button" class="close btn btn-lg" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="mt-5" for="nome">Nome</label>
                    <input type="text" name="nome-professor" id="nome-professor" class="form-control" placeholder="Nome do professor">
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input class="form-control" id="email-professor" name="email-professor" type="email" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label class="mt-3" for="login">Login</label>
                    <input class="form-control" id="login-professor" name="login-professor" type="text" placeholder="Login">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn custom-button" data-dismiss="modal" id="cadastrarProfessorButton">Cadastrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#cadastrarProfessorButton').click(function() {
            var nome = $('#nome-professor').val();
            var email = $('#email-professor').val();
            var login = $('#login-professor').val();

            // Verifique se os campos obrigatórios estão preenchidos
            if (nome.trim() === '' || email.trim() === '' || login.trim() === '') {
                alert('Por favor, preencha todos os campos.');
                return;
            }

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            var data = {
                _token: csrfToken,
                nome: nome,
                email: email,
                login: login,
                contexto: 'modal'
            };

            $.ajax({
                type: 'POST',
                url: "{{ route('store_professor') }}",
                data: data,
                success: function(response) {
                    if (response.error) {
                        alert(response.error);
                    } else {
                        // Feche o modal
                        $('#createProfessor').modal('hide');

                        // Atualize o <select> na página de edição
                        var $selectProfessor = $('#professor_id');
                        $selectProfessor.empty(); // Limpe todas as opções

                        // Adicione as opções atualizadas com base na resposta do servidor
                        console.log(response);
                        $.each(response.professores, function(index, professor) {
                            $selectProfessor.append($('<option>', {
                                value: professor.id,
                                text: professor.nome
                            }));
                        });
                    }
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
    });
</script>

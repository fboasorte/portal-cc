<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal fade" id="createServidor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar servidor</h5>
                <button type="button" class="close btn btn-lg" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="mt-5" for="nome-servidor">Nome</label>
                    <input type="text" name="nome-servidor" id="nome-servidor" class="form-control" placeholder="Nome do servidor" required>
                </div>
                <div class="mb-3">
                    <label for="email-servidor">Email</label>
                    <input class="form-control" id="email-servidor" name="email-servidor" type="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <label class="mt-3" for="login-servidor">Login</label>
                    <input class="form-control" id="login-servidor" name="login-servidor" type="text" placeholder="Login" required>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn custom-button" data-dismiss="modal" id="cadastrarServidorButton">Cadastrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#cadastrarServidorButton').click(function() {
            var nome = $('#nome-servidor').val();
            var email = $('#email-servidor').val();
            var login = $('#login-servidor').val();

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
                url: "{{ route('servidor.store') }}",
                data: data,
                success: function(response) {
                    if (response.error) {
                        alert(response.error);
                    } else {
                        // Feche o modal
                        $('#createServidor').modal('hide');

                        // Atualiza os checkboxs na página colegiado em cadastrar servidor
                        var servidoresCheckboxHTML = '';
                        $.each(response.servidores, function(index, servidor) {
                            var checkboxId = 'servidor_' + servidor.id;
                            servidoresCheckboxHTML +=
                            '<div class="form-check">' +
                            '<input type="checkbox" class="form-check-input" name="servidores[]" id="' + checkboxId + '" value="' + servidor.id + '">' +
                            '<label for="' + checkboxId + '" class="form-check-label">' + servidor.nome + '</label>' +
                            '</div>';
                        });

                        $('#servidores .form-check').remove();
                        $('#servidores').append(servidoresCheckboxHTML);
                    }
                },
            });
        });
    });
</script>

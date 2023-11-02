<meta name="csrf-token" content="{{ csrf_token() }}">
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

            // Verifique se os campos obrigatórios estão preenchidos
            if (nome.trim() === '' || email.trim() === '') {
                alert('Por favor, preencha todos os campos.');
                return;
            }

            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Por favor, insira um email válido.');
                return;
            }

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            var data = {
                _token: csrfToken,
                nome: nome,
                email: email,
                contexto: 'modal'
            };

            $.ajax({
                type: 'POST',
                url: "{{ route('professor.store') }}",
                data: data,
                success: function(response) {
                    if (response.error) {
                        alert(response.error);
                    } else {
                        // Feche o modal
                        $('#createProfessor').modal('hide');

                        // Atualiza os checkboxs na página colegiado em cadastrar professor
                        var professoresCheckboxHTML = '';
                        $.each(response.professores, function(index, professor) {
                            var checkboxId = 'professor_' + professor.id;
                            professoresCheckboxHTML +=
                            '<div class="form-check">' +
                            '<input type="checkbox" class="form-check-input" name="professores_internos[]" id="' + checkboxId + '" value="' + professor.id + '">' +
                            '<label for="' + checkboxId + '" class="form-check-label">' + professor.nome + '</label>' +
                            '</div>';
                        });

                        $('#professores .form-check').remove();
                        $('#professores').append(professoresCheckboxHTML);

                        // Atualize o <select> na página de edição
                        var $selectProfessor = $('#professor_id');
                        var $selecionado = $selectProfessor.val();
                        $selectProfessor.empty(); // Limpe todas as opções
                        $selectProfessor.append($('<option value="" disabled selected>Selecione um orientador</option>'));


                        // Adicione as opções atualizadas com base na resposta do servidor
                        $.each(response.professores, function(index, professor) {
                            $selectProfessor.append($('<option>', {
                                value: professor.id,
                                text: professor.nome
                            }));
                        });

                        $selectProfessor.val($selecionado);
                    }
                },
            });
        });
    });
</script>

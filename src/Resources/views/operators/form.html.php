<!-- Modal -->
<div class="modal fade" id="register-operator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro do operador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="operator-form" role="form" autocomplete="off">
                    <div class="alert hidden" role="alert">
                    </div>

                    <div class="form-group">
                        <label>Nome</label>
                        <input name="nome" type="text" class="form-control" max-length="64" required autofocus placeholder="Nome do operador">
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input name="email" type="email" class="form-control" max-length="64" required placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input name="senha" type="password" class="form-control" max-length="15" required placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <label>Mensagem</label>
                        <textarea name="mensagem" id="operator-message" cols="30" rows="3" placeholder="Mensagem" class="form-control"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button id="save-form" type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>
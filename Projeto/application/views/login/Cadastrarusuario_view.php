<?php
    $this->load->view('uteis/cabecalho');
?>
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="row-fluid">
        <?php if ($mensagem = get_mensagem_sessao()) { ?>
            <div class="row"><div class="alert alert-info" role="alert"><?= $mensagem ?></div></div>
        <?php } ?>
        <h2>Cadastro de Usuários</h2>
        <form action="<?php echo base_url('Login/ValidaCadastro'); ?>" method="post">
            <div class="form-group">
                <label>Usuário</label>
                <input type="text" name="usuario" class="form-control">
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control">
            </div>
            <div class="form-group">
                <p></p><label>Nome Empresa</label></p>
                <input type="text" name="razaosocial" class="form-control">
            </div>

            <input type="submit" value="Cadastrar" class="btn btn-default">

        </form>
    </div>
    <div>
        <a href="<?php echo base_url('Login'); ?>" class="alert-dismissable">Logout</a>
    </div>
</div>
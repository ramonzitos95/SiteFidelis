<?php
    $this->load->view('uteis/cabecalho');
?>
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="row-fluid">
        <?php if ($mensagem = get_mensagem_sessao()) { ?>
            <div class="row"><div class="alert alert-info" role="alert"><?= $mensagem ?></div></div>
        <?php } ?>
        <h2>Alteração de Senha</h2>
        <form action="<?php echo base_url('Login/ValidaCadastro'); ?>" method="post">
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control">
            </div>
            <div class="form-group">
                <label>Repita a Senha</label>
                <input type="password" name="senharepete" class="form-control">
            </div>

            <input type="submit" value="Cadastrar" class="btn btn-default">

        </form>
    </div>
    <div>
        <a href="<?php echo base_url('Login'); ?>" class="alert-dismissable">Logout</a>
    </div>
</div>
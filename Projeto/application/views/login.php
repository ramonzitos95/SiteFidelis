<div class="container-fluid">
    <div class="row-fluid">
        <?php if ($mensagem = get_mensagem_sessao()) { ?>
        <div class="row"><div class="alert alert-info" role="alert"><?= $mensagem ?></div></div>
        <?php } ?>
        <form action="<?php echo base_url('Login/Logar');?>" method="post" enctype="multipart/form-data">
            <h2 class="text-info">Digite seu usuário e senha para acesso ao site Promobusque</h2>
            <div class="row">
                <div class="form-group col-md-3 col-md-offset-1">
                    <label>Usuário</label>
                    <input type="text" name="usuario" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3 col-md-offset-1">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-1 col-md-offset-1">
                    <input type="submit" value="Logar" class="btn btn-default">
                </div>
                <div class="col-md-offset-1">
                    <a href="<?php echo base_url('Login/CadastroUsuario');?>" class="alert-link">Cadastre-se</a>
                </div>
                <div class="col-md-offset-1">
                    <a href="<?php echo base_url('Login');?>" class="alert-dismissable">Logout</a>
                </div>
            </div>
        </form>
    </div>

</div>



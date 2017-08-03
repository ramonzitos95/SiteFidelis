<div class="container-fluid">
    <div class="row-fluid">
        <?php echo validation_errors(); ?>
        <form action="<?php echo base_url('Login/Logar');?>" method="post" enctype="multipart/form-data">
        <h2 class="text-info">Digite seu usuário e senha para acesso ao sistema</h2>
        <div class="form-group">
            <label>Usuário</label>
            <input type="text" name="usuario" class="form-control">
        </div>
        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="senha" class="form-control">
        </div>
            <input type="hidden" value="aluno" name="tipousuario">
        <input type="submit" value="Logar" class="btn btn-default">

        </form>
    </div>
    <div class="col-md-offset-10">
        <a href="<?php echo base_url('LoginAdm');?>" class="alert-link">Administrador</a>
    </div>
    <div>
        <a href="<?php echo base_url('Login/Cadastrar');?>" class="alert-link">Cadastre-se</a>
    </div>
    <div>
        <a href="<?php echo base_url('Login');?>" class="alert-dismissable">Logout</a>
    </div>
</div>



<?php //$this->load->view('uteis/cabecalho'); ?>
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="row-fluid">
        <?php //echo validation_errors(); ?>
        <form action="<?php echo base_url('LoginAdm/logar'); ?>" method="post" enctype="multipart/form-data">
            <h2 class="text-info">Login Administrador</h2>
            <div class="form-group">
                <label>Usuário</label>
                <input type="text" name="usuario" class="form-control">
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control">
            </div>
                <input type="hidden" value="colaborador" name="tipousuario">
            <input type="submit" value="Logar" class="btn btn-default" onclick="confirmar()">

        </form>
    </div>
    <script type="text/javascript">
        function confirmar() {
                var cadastrar = confirm('Você possui um usuário já cadastrado, desejas cadastrar um novo?');
                if (cadastrar) {
                    window.location('<?php echo base_url('Login/Cadastrar')?>');
                } else {
                    window.location('<?php echo base_url('Menu')?>');
                }
        }
    </script>
    <div>
        <a href="<?php echo base_url('Login/Cadastrar'); ?>" class="alert-link">Cadastre-se</a>
    </div>
    <div>
        <a href="<?php echo base_url('Login'); ?>" class="alert-dismissable">Logout</a>
    </div>
</div>



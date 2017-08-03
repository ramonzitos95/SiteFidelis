<?php $this->load->view('login/menu_view'); ?>
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="row-fluid">
        <h2 id="topo">Cadastro de Turma</h2>
        <div class="alert alert-danger" id="erros" style="display: none;">

        </div>
        <form action="<?php echo base_url('Turma/validaTurma'); ?>" id="form" method="post">
            <div class="form-group">
                <label>Nome da Turma</label>
                <input type="text" name="nome" id="turmanome" class="form-control">
            </div>

            <input type="submit" value="Cadastrar" class="btn btn-default">

        </form>
    </div>
    <div>
        <a href="<?php echo base_url('Login'); ?>" class="alert-dismissable">Logout</a>
    </div>
    <script src="<?php echo base_url('assets/js/turma.js'); ?>"></script>
</div>

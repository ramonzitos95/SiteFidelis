<?php
    $this->load->view('login/menu_view');
?>

<div class="container-fluid" xmlns="http://www.w3.org/1999/html">

    <div class="row-fluid">
        <?php echo validation_errors(); ?>
        <h2 id="topo">Cadastro de Disciplinas</h2>
        <div class="alert alert-danger" id="erros" style="display: none;">

        </div>
        <form action="<?php echo base_url('Disciplina/validaDisciplina'); ?>" id="form" method="post">
            <div class="form-group">
                <label>Nome Disciplina</label>
                <input type="text" name="nome" id="nome" class="form-control">
            </div>
            <div class="form-group">
                <label>Professor</label>
                <input type="text" name="professor" id="professor" class="form-control">
            </div>
            <div class="form-group">
                <label>Carga horária</label>
                <input type="text" name="cargahoraria" id="cargahoraria" class="form-control">
            </div>
            <div class="form-group">
                <label>Data de Cadastro</label>
                <input type="date" name="datacadastro" id="datacadastro" class="form-control">
            </div>
            <div class="form-group col-md-12">
                <label>Conceito</label>
                <textarea class="form-control" name="conceito" id="conceito"></textarea>
            </div>

            <div class="form-group">
                <label>Ementa</label>
                <input type="text" name="ementa" id="ementa" class="form-control">
            </div>
            <div class="form-group">
                <label>Data de Inicio</label>
                <input type="date" name="datainicio" id="datainicio" class="form-control">
            </div>
            <div class="form-group">
                <label>Situação</label><br>
                <label>Ativo</label>
                <input type="radio" name="situacao" value="ativo">
                <label>Inativo</label>
                <input type="radio" name="situacao" value="inativo">
            </div>
            <div class="form-group">
                <label>Universidade</label>
                <input type="text" name="universidade" id="universidade" class="form-control">
            </div>
            <div class="form-group">
                <label>Modalidade</label>
                <input type="text" name="modalidade" id="modalidade" class="form-control">
            </div>
            <div class="">
                <input type="submit" value="Cadastrar" class="btn btn-default">
            </div>
        </form>
        <script src="<?php echo base_url('assets/js/disciplina.js'); ?>"></script>
        <div class="col-md-6">
            <a href="<?php echo base_url('Login'); ?>" class="alert-link">Logout</a>
        </div>
    </div>

</div>

<?php $this->load->view('uteis/rodape')?>
<?php
$this->load->view('login/menu_view');
?>

    <div class="container-fluid" >
    <div class="row-fluid">
        <?php echo validation_errors(); ?>
        <h2 id="topo">Cadastro de Cursos</h2>
        <div id="erros" style="display: none;" class="alert alert-danger">

        </div>
        <form action="<?php echo base_url('Curso/validaCurso'); ?>" id="form" method="post">
            <div class="form-group col-md-12">
                <label>Nome do Curso</label><br>
                <input type="text" name="cursonome" id="cursonome" class="form-control" required>
            </div>
            <div class="form-group col-md-12">
                <label>Carga Horária</label><br>
                <input type="text" name="cargahoraria" id="cargahoraria" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <label>Ementa</label><br>
                <textarea class="form-control" id="ementa" name="ementa" required></textarea>
            </div>
            <div class="form-group col-md-4">
                <label>Bibliografia</label><br>
                <textarea class="form-control" id="bibliografia" name="bibliografia"></textarea>
            </div>
            <div class="form-group col-md-12">
                <label>Modo Curso</label><br>
                <label>Presencial</label>
                <input type="radio" name="modocurso" value="presencial" required>
                <label>Distância</label>
                <input type="radio" name="modocurso" value="distancia">
            </div>
            <div class="form-group col-md-6">
                <label>Origem Curso</label><br>
                <input type="text" name="origem" class="form-control">
            </div><br>
            <div class="form-group col-md-6">
                <label>Situação do Curso</label><br>
                <label>Ativo</label>
                <input type="radio" name="situacao" value="ativo" required>
                <label>Inativo</label>
                <input type="radio" name="situacao" value="inativo">
            </div>

            <div class="col-md-12">
                <input type="submit" value="Cadastrar" class="btn btn-default">
            </div>
        </form>
    </div>
    <script src="<?php echo base_url('assets/js/curso.js'); ?>"></script>
</div>
<?php $this->load->view('uteis/rodape'); ?>
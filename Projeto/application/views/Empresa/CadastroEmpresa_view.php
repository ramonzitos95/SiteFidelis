<?php
$this->load->view('login/menu_view');
?>

    <div class="container-fluid" >
    <div class="row-fluid">
        <?php echo validation_errors(); ?>
        <h2 id="topo">Cadastro de Empresa</h2>
        <div id="erros" style="display: none;" class="alert alert-danger">

        </div>

        <form action="<?php echo base_url('Empresa/cadastrarEmpresa'); ?>" id="form" method="post" enctype="multipart/form-data">
            <b><label>Logo da Empresa</label></b><br>
            Selecione uma imagem: <input type="file" name="foto"/><br /><br />

            <div class="form-group col-md-12">
                <label>Razão Social</label><br>
                <input type="text" name="razaosocial" id="razaosocial" class="form-control" required>
            </div>
            <div class="form-group col-md-12">
                <label>CNPJ</label><br>
                <input type="text" name="cnpj" id="cnpj" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <label>CEP</label><br>
                <input type="text" name="cep" id="cep" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <b><label>Site</label></b><br>
                <input type="text" name="site" id="site" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <b><label>Telefone</label></b><br>
                <input type="text" name="telefone" id="telefone" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <b><label>Endereco</label></b><br>
                <input type="text" name="endereco" id="endereco" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <b><label>cidade</label></b><br>
                <input type="text" name="cidade" id="cidade" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <b><label>Estado</label></b><br>
                <input type="text" name="estado" id="estado" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
                <label>Data de Cadastro</label><br>
                <input type="date" name="datacadastro" id="datacadastro" class="form-control" required>
            </div><br>

            <div class="col-md-12">
                <input type="submit" value="Cadastrar" class="btn btn-default">
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('uteis/rodape'); ?>
<?php
    $this->load->view('login/menu_view');
?>
    <script type="text/javascript">
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };
    </script>
    <div class="container-fluid" >
    <div class="row-fluid">
        <?php if ($mensagem = get_mensagem_sessao()) { ?>
            <div class="row"><div class="alert alert-info" role="alert"><?= $mensagem ?></div></div>
        <?php } ?>
        <h2 align="center" id="topo">Cadastro de Promoção</h2>
        <div id="erros" style="display: none;" class="alert alert-danger">

        </div>

        <form action="<?php echo base_url('Promocao/CadastrarPromocao'); ?>" id="form" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-3">
                <b><label>Foto da Promoção</label></b><br>
                Selecione uma imagem: <input type="file" id="uploadImage" name="foto"  onchange="PreviewImage();"/><br /><br />
            </div>
            <div class="form-group col-md-2">
                <img id="uploadPreview" style="width: 100px; height: 75px; border-style: solid; border-width: 1px;" />
            </div>
             <div class="form-group col-md-8">
                <label>Descrição</label><br>
                <input type="text" name="cnpj" id="cnpj" class="form-control" required>
            </div>
            <div class="form-group col-md-4"></div>
            <div class="form-group col-md-4">
                <label>Data da Validade</label><br>
                <input type="data" name="datavalidade" id="razaosocial" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <label>Situação</label><br>
                <input type="text" name="cep" id="cep" class="form-control" required>
            </div>
             <div class="form-group col-md-4">
                <label>Situação</label> <br>
                <label>Ativo</label>
                <input type="radio" name="situacao" class="radio-inline" value="1">
                <label>Inativo</label>
                <input type="radio" name="situacao" class="radio-inline" value="0">
            </div>        

            <div class="form-group col-md-4">
                <b><label>Produto</label></b><br>
                <input type="text" name="produto" id="cidade" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <b><label>Valor</label></b><br>
                <input type="text" name="valorproduto" id="estado" class="form-control" required>
            </div>

            <div class="col-md-12">
                <input type="submit" value="Cadastrar" class="btn btn-default">
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('uteis/rodape'); ?>



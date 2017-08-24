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

        <?php 
            foreach ($obj_promocao_model as $p) { 
            $caminhoimagem = base_url($p->foto . '/' . $p->arquivo);    
        ?>

        <form action="<?php if(isset($action)) echo base_url($action) ?>"  id="form" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-3">
                    <b><label>Foto da Promoção</label></b><br>
                    Selecione uma imagem: <input type="file" id="uploadImage" name="foto"  onchange="PreviewImage();"/><br /><br />
                </div>
                <div class="form-group col-md-2">
                    <img id="uploadPreview" style="width: 100px; height: 75px; border-style: solid; border-width: 1px;" src="<?php echo $caminhoimagem; ?>"/>
                </div>
            </div>

            <div class="row">
                <input type="hidden" name="empresa" id="empresa" class="form-control"
                       value="<?php if(isset($empresaid)) echo $empresaid; ?>" required>

                <input type="hidden" name="promocaoid" id="promocaoid" class="form-control"
                       value="<?php if(isset($p->promocaoid)) echo $p->promocaoid; ?>" required>

                <div class="form-group col-md-5">
                    <label>Descrição</label><br>
                    <input type="text" name="descricaopromocao" id="descricaopromocao" class="form-control" value="<?php if (isset($p->descricaopromocao)) echo $p->descricaopromocao; ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-3">
                    <label>Data da Validade</label><br>
                    <input type="data" name="datavalidade" id="datavalidade" class="form-control" value="<?php if (isset($p->datavalidade)) echo $p->datavalidade; ?>" required>
                </div>

                <div class="form-group col-md-2">
                    <label>Situação</label> <br>
                    <label>Ativo</label>
                    <input type="radio" name="situacao" class="radio-inline" value="1">
                    <label>Inativo</label>
                    <input type="radio" name="situacao" class="radio-inline" value="0">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-3">
                    <b><label>Produto</label></b><br>
                    <input type="text" name="produto" id="produto" class="form-control" 
                     value="<?php if (isset($p->produto)) echo $p->produto; ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <b><label>Valor</label></b><br>
                    <input type="number" name="valorproduto" id="valorproduto" class="form-control" value="<?php if (isset($p->valorproduto)) echo $p->valorproduto; ?>" required>
                </div>
            </div>

            <div class="col-md-1 col-md-offset-2">
                <input type="submit" value="<?php if (isset($titulobotao)){ echo $titulobotao;} ?>" class="btn btn-default">
            </div>
        </form>

        <?php } ?>
    </div>
</div>
<?php $this->load->view('uteis/rodape'); ?>



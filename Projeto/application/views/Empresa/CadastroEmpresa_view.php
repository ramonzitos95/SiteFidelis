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
        <h2 align="center" id="topo"><?php if(isset($tituloprincipal)) echo $tituloprincipal; ?></h2>
        <div id="erros" style="display: none;" class="alert alert-danger">

        </div>

        <form action="<?php if(isset($action)) echo base_url($action) ?>" id="form" method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="form-group col-md-3">
                    <b><label>Logo da Empresa</label></b><br>
                    Selecione uma imagem: <input type="file" id="uploadImage" name="foto"  onchange="PreviewImage();"/><br /><br />
                </div>
                <div class="form-group col-md-2">
                    <img id="uploadPreview" style="width: 100px; height: 75px; border-style: solid; border-width: 1px;" />
                </div>
            </div>
            <input type="hidden" name="empresaid" id="empresaid" class="form-control"
                   value="<?php if(isset($obj_empresa_model[0]["empresaid"])) echo $obj_empresa_model[0]["empresaid"]; ?>" required>
            <div class="row">
                <div class="form-group col-md-5">
                    <label>Razão Social</label><br>
                    <input type="text" name="razaosocial" id="razaosocial" class="form-control"
                           value="<?php if(isset($obj_empresa_model[0]["razaosocial"])) echo trim($obj_empresa_model[0]["razaosocial"]); ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-3">
                    <label>CNPJ</label><br>
                    <input type="text" name="cnpj" id="cnpj" class="form-control"
                           value="<?php if(isset($obj_empresa_model[0]["cnpj"])) echo trim($obj_empresa_model[0]["cnpj"]); ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label>CEP</label><br>
                    <input type="text" name="cep" id="cep" class="form-control"
                           value="<?php if(isset($obj_empresa_model[0]["cep"])) echo trim($obj_empresa_model[0]["cep"]); ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-3">
                    <b><label>Site</label></b><br>
                    <input type="text" name="site" id="site" class="form-control"
                           value="<?php if(isset($obj_empresa_model[0]["site"])) echo trim($obj_empresa_model[0]["site"]); ?>">
                </div>
                <div class="form-group col-md-2">
                    <b><label>Telefone</label></b><br>
                    <input type="text" name="telefone" id="telefone" class="form-control"
                           value="<?php if(isset($obj_empresa_model[0]["telefone"])) echo trim($obj_empresa_model[0]["telefone"]); ?>">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-5">
                    <b><label>Endereco</label></b><br>
                    <input type="text" name="endereco" id="endereco" class="form-control"
                           value="<?php if(isset($obj_empresa_model[0]["endereco"])) echo trim($obj_empresa_model[0]["endereco"]); ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-3">
                    <b><label>cidade</label></b><br>
                    <input type="text" name="cidade" id="cidade" class="form-control"
                           value="<?php if(isset($obj_empresa_model[0]["cidade"])) echo trim($obj_empresa_model[0]["cidade"]); ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <?php
                    //UF = ds_uf
                    echo form_label('UF:', 'estado');
                    $optionEstados = Array(
                        'Acre' => 'Acre',
                        'Alagoas' => 'Alagoas',
                        'Amapá' => 'Amapá',
                        'Amazonas' => 'Amazonas',
                        'Bahia' => 'Bahia',
                        'Ceará' => 'Ceará',
                        'Distrito Federal' => 'Distrito Federal',
                        'Espírito Santo' => 'Espírito Santo',
                        'Goiás' => 'Goiás',
                        'Maranhão' => 'Maranhão',
                        'Mato Grosso' => 'Mato Grosso',
                        'Mato Grosso do Sul' => 'Mato Grosso do Sul',
                        'Minas Gerais' => 'Minas Gerais',
                        'Pará' => 'Pará',
                        'Paraíba' => 'Paraíba',
                        'Paraná' => 'Paraná',
                        'Pernambuco' => 'Pernambuco',
                        'Piauí' => 'Piauí',
                        'Rio de Janeiro' => 'Rio de Janeiro',
                        'Rio Grande do Norte' => 'Rio Grande do Norte',
                        'Rio Grande do Sul' => 'Rio Grande do Sul',
                        'Santa Catarina' => 'Santa Catarina',
                        'São Paulo' => 'São Paulo',
                        'Sergipe' => 'Sergipe',
                        'Tocantins' => 'Tocantins'
                    );
                    $estado = "";
                    if(isset($obj_empresa_model[0]["estado"])) $estado = trim($obj_empresa_model[0]["estado"]);
                    echo form_dropdown('estado', $optionEstados, 'Santa Catarina', $estado, 'class="form-control"');
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-2">
                    <label>Data de Cadastro</label><br>
                    <input type="date" name="datacadastro" id="datacadastro" class="form-control"
                           value="<?php date("dd/mm/yyyy") ?>" required>
                </div>
            </div>

            <div class="col-md-12">
                <input type="submit" value="<?php echo $tituloBotao ?>" class="btn btn-default">
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('uteis/rodape'); ?>



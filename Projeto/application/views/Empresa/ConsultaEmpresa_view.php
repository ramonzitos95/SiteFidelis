<?php

$this->load->view('login/menu_view');
?>

    <div class="container-fluid">
        <h3>Buscar Empresas:</h3>
        <div class="form-inline form-group" action="<?php echo base_url('Empresa/ConsultaFiltro'); ?>">
            <form id="form">
                <label>Buscar por: </label>
                <select id="atributo" class="form-control" name="operacao" required>
                    <option value="nome">Razão Social</option>
                    <option value="endereco">Endereço</option>
                    <option value="cidade">Cidade</option>
                </select>
                <input id="valorEve" type="text" class="form-control" name="dado"/>
                <button type="submit" class="btn btn-primary">Consultar</button>
            </form>
        </div>
    </div>
    <div class="row-fluid">
        <div id="div1">


            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr class="cabecalho">
                        <th colspan="2">Razão Social</th>
                        <th colspan="1">CNPJ</th>
                        <th colspan="1">CEP</th>
                        <th colspan="1">Telefone</th>
                        <th colspan="1">Cidade</th>
                        <th colspan="1">Estado</th>
                        <th colspan="1"></th>
                        <th colspan="1"></th>
                    </tr>
                    </thead>
                    <tbody id="conteudo">
                        <?php foreach ($empresas as $empresa) { ?>
                        <tr>
                            <td colspan="2"><?php echo $empresa->razaosocial; ?></td>
                            <td colspan="1"><?php echo $empresa->cnpj; ?></td>
                            <td colspan="1"><?php echo $empresa->cep; ?></td>
                            <td colspan="1"><?php echo $empresa->telefone; ?></td>
                            <td colspan="1"><?php echo $empresa->cidade; ?></td>
                            <td colspan="1"><?php echo $empresa->estado; ?></td>
                            <td colspan="1">
                                <a href="<?php echo base_url('Empresa/Alteracao/' . $empresa->empresaid); ?>"
                                   class="btn btn-large btn-primary">Editar Empresa</a>
                            </td>
                            <td colspan="1">
                                <a href="<?php echo base_url('Empresa/DeletarEmpresa/' . $empresa->empresaid); ?>"
                                   class="btn btn-large btn-primary">Excluir Empresa</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>


        </div>
    </div>

    <script>

        $("#form").submit(
            function (e) {
                e.preventDefault();
                $.ajax({
                    url: "/SiteFidelis/SiteFidelis/Projeto/Empresa/ConsultaFiltro",
                    type: "post",
                    data: $(this).serialize(),
                    beforeSend: function () {
                        $("#conteudo").html("Carregando...");
                    },
                    success: function (resposta) {
                        $("#conteudo").html(resposta);
                        console.log(resposta);
                    }
                })
            }
        )

    </script>

<?php $this->load->view('uteis/rodape'); ?>
<?php

$this->load->view('login/menu_view');

?>

    <div class="container-fluid">
        <h3>Buscar Promoções:</h3>
        <div class="form-inline form-group" action="<?php echo base_url('Empresa/ConsultaFiltro'); ?>">
            <form id="form">
                <label>Buscar por: </label>
                <select id="atributo" class="form-control" name="operacao" required>
                    <option value="nome">Nome</option>
                    <option value="datavalidade">Data Validade</option>
                    <option value="produto">Produto</option>
                    <option value="valor">Valor</option>
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
                        <th colspan="2">Descrição</th>
                        <th colspan="1">Data Validade</th>
                        <th colspan="1">Situação</th>
                        <th colspan="1">Produto</th>
                        <th colspan="1">Valor</th>
                        <th colspan="2">Foto</th>
                        <th colspan="1"></th>
                        <th colspan="1"></th>
                    </tr>
                    </thead>
                    <tbody id="conteudo">
                        <?php foreach ($promocoes as $promocao) { ?>
                        <tr>
                            <td colspan="2"><?php echo $promocao->descricaopromocao; ?></td>
                            <td colspan="1"><?php echo date_format(new DateTime($promocao->datavalidade) , 'd/m/Y'); ?></td>
                            <td colspan="1"><?php echo $promocao->situacao; ?></td>
                            <td colspan="1"><?php echo $promocao->produto; ?></td>
                            <td colspan="1"><?php echo $promocao->valorproduto; ?></td>
                            <td colspan="2"><?php 
                                $caminho_completo = trim($promocao->foto);
                                $arquivo = trim($promocao->arquivo);

                                $caminho_ext = base_url($caminho_completo . '/' . $arquivo);

                                if (!empty($caminho_ext) && $arquivo != ""){
                                    echo '<img src='.$caminho_ext.' width="150" height="75" />'; 
                                }
                            ?></td> 
                            <td colspan="1">
                                <a href="<?php echo base_url('Promocao/Alterar/' . $promocao->promocaoid); ?>"
                                   class="btn btn-large btn-primary">Editar Promoção</a>
                            </td>
                            <td colspan="1">
                                <a href="<?php echo base_url('Promocao/DeletarPromocao/' . $promocao->promocaoid); ?>"
                                   class="btn btn-large btn-primary">Excluir Promoção</a>
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
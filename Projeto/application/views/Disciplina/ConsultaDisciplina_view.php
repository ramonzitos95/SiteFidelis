<?php
$this->load->view('uteis/cabecalho');
$this->load->view('login/menu_unico');
?>

    <div class="container-fluid">
        <h3 class="text-capitalize">Buscar Disciplinas:</h3>
        <div class="form-inline form-group" action="<?php echo base_url('Disciplina/Consulta'); ?>">
            <form id="form">
                <label>Buscar por: </label>
                <select id="atributo" class="form-control" name="operacao" required>
                    <option value="nome">Nome</option>
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
                        <th colspan="1">Disciplina</th>
                        <th colspan="1">Professor</th>
                        <th colspan="1">Carga Horaria</th>
                        <th colspan="1">Modalidade</th>
                        <th colspan="1">Situaçao</th>
                        <th colspan="1"></th>
                        <th colspan="1"></th>
                    </tr>
                    </thead>
                    <tbody id="conteudo">
                    <?php foreach ($disciplinas as $d) {
                        If ($d->situacaodisciplina == true) {
                            $txtSituacao = "Ativo";
                        } else {
                            $txtSituacao = "Inativo";
                        }
                        ?>
                        <tr>
                            <td colspan="1"><?php echo $d->nome; ?></td>
                            <td colspan="1"><?php echo $d->professor; ?></td>
                            <td colspan="1"><?php echo $d->cargahoraria; ?></td>
                            <td colspan="1"><?php echo $d->modalidade; ?></td>
                            <td colspan="1"><?php echo $txtSituacao ?></td>
                            <td colspan="1">
                                <a href="<?php echo base_url('Disciplina/Alteracao/' . $d->disciplinaid); ?>"
                                   class="btn btn-large btn-primary">Editar Disciplina</a>
                            </td>
                            <td colspan="1">
                                <a href="<?php echo base_url('Disciplina/DeletarDisciplina/' . $d->disciplinaid); ?>"
                                   class="btn btn-large btn-primary">Excluir Disciplina</a>
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
                    url: "/CodeigniterBase/Projeto/Disciplina/ConsultaFiltro",
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
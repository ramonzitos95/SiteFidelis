<?php
$this->load->view('uteis/cabecalho');
$this->load->view('login/menu_unico');
?>

    <div class="container-fluid">
        <h3>Buscar Cursos:</h3>
        <div class="form-inline form-group" action="<?php echo base_url('Curso/ConsultaFiltro'); ?>">
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
                        <th colspan="1">Empresa</th>
                        <th colspan="1">Carga Horaria</th>
                        <th colspan="1">Modo do Cuso</th>
                        <th colspan="1">Origem</th>
                        <th colspan="1">Situaçao</th>
                        <th colspan="1"></th>
                        <th colspan="1"></th>
                    </tr>
                    </thead>
                    <tbody id="conteudo">
                    <?php foreach ($empresas as $empresa) {
                        If ($empresa->situacao == true) {
                            $txtSituacao = "Ativo";
                        } else {
                            $txtSituacao = "Inativo";
                        }
                        ?>
                        <tr>
                            <td colspan="1"><?php echo $curso->cursonome; ?></td>
                            <td colspan="1"><?php echo $curso->cargahoraria; ?></td>
                            <td colspan="1"><?php echo $curso->modocurso; ?></td>
                            <td colspan="1"><?php echo $curso->origemcurso; ?></td>
                            <td colspan="1"><?php echo $txtSituacao ?></td>
                            <td colspan="1">
                                <a href="<?php echo base_url('Curso/Alteracao/' . $curso->cursoid); ?>"
                                   class="btn btn-large btn-primary">Editar Curso</a>
                            </td>
                            <td colspan="1">
                                <a href="<?php echo base_url('Curso/DeletarCurso/' . $curso->cursoid); ?>"
                                   class="btn btn-large btn-primary">Excluir Curso</a>
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
                    url: "/CodeigniterBase/Projeto/Curso/ConsultaFiltro",
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
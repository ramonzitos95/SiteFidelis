

<?php
$this->load->view('uteis/cabecalho');
$this->load->view('login/menu_unico');
?>

    <div class="container-fluid">
        <h3>Buscar Turmas:</h3>
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
                        <th colspan="8">Turma</th>
                    </tr>
                    </thead>
                    <tbody id="conteudo">
                    <?php foreach ($turmas as $turma) {
                        ?>
                        <tr>
                            <td colspan="8"><?php echo $turma->turmanome; ?></td>
                            <td colspan="1">
                                <a href="<?php echo base_url('Turma/Alteracao/' . $turma->turmaid); ?>"
                                   class="btn btn-large btn-primary col-md-3 col-sm-6" >Editar turma</a>
                            </td>
                            <td colspan="1">
                                <a href="<?php echo base_url('Turma/DeletarTurma/' . $turma->turmaid); ?>"
                                   class="btn btn-large btn-primary col-md-3 col-sm-6">Excluir Turma</a>
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
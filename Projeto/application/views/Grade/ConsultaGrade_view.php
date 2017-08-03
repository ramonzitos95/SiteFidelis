<?php
$this->load->view('uteis/cabecalho');
$this->load->view('login/menu_unico');
?>

    <div class="container-fluid">
        <h3>Buscar Grades:</h3>
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
                        <th colspan="1">Codigo da Grade</th>
                        <th colspan="1">Semestre</th>
                        <th colspan="1">carga horária</th>
                        <th colspan="1">Dia da Semana</th>
                        <th colspan="1">Data de Validade</th>
                        <th colspan="1"></th>
                        <th colspan="1"></th>
                    </tr>
                    </thead>
                    <tbody id="conteudo">
                    <?php foreach ($grades as $grade) {
                        if($grade->datavalidade == null){
                            $dataformatada = '';
                        }else{
                            $dataformatada = date('d/m/Y', strtotime($grade->datavalidade));
                        }

                        if($grade->gradeid == null AND $grade->cargahoraria == null AND $grade->diasemana == null AND $grade->diasemana == null){
                            $gradeid = '';
                            $semestreano = '';
                            $cargahoraria = '';
                            $diasemana = '';
                        }
                        else
                        {
                            $gradeid = $grade->gradeid;
                            $semestreano = $grade->semestreano;
                            $cargahoraria = $grade->cargahoraria;
                            $diasemana = $grade->diasemana;
                        }

                        $this->load->library('LogArquivo');
                        $tihs->LogArquivo->gravar("TESTE");
                        ?>

                        <tr>
                            <td colspan="1"><?php echo $gradeid; ?></td>
                            <td colspan="1"><?php echo $semestreano; ?></td>
                            <td colspan="1"><?php echo $cargahoraria; ?></td>
                            <td colspan="1"><?php echo $diasemana; ?></td>
                            <td colspan="1"><?php echo $dataformatada; ?></td>
                            <td colspan="1">
                                <a href="<?php echo base_url('Grade/Alteracao/' . $grade->gradeid); ?>"
                                   class="btn btn-large btn-primary">Editar Grade</a>
                            </td>
                            <td colspan="1">
                                <a href="<?php echo base_url('Grade/DeletarGrade/' . $grade->gradeid); ?>"
                                   class="btn btn-large btn-primary">Excluir Grade</a>
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
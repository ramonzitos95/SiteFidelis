<?php
    $this->load->view('uteis/cabecalho');
    $this->load->view('login/menu_unico');

    $modocurso = $curso[0]->modocurso;
    $situacao = $curso[0]->situacao;
    if($situacao == 1){
        $textoSituacao = "ativo";
    } else {
        $textoSituacao = "inativo";
    }
?>
<div class="container-fluid" >
    <div class="row-fluid">
        <?php echo validation_errors(); ?>
        <h2 id="topo">Atualização do Curso</h2>
        <div id="erros" style="display: none;" class="alert alert-danger">

        </div>
        <form id="form" action="<?php echo base_url('Curso/AtualizaCurso'); ?>" method="post">
            <input type="hidden" name="cursoid" value="<?php echo $curso[0]->cursoid; ?>" />
            <div class="form-group col-md-12">
                <label>Nome do Curso</label><br>
                <input type="text" name="cursonome" id="cursonome" value="<?php echo $curso[0]->cursonome; ?>" class="form-control">
            </div>
            <div class="form-group col-md-12">
                <label>Carga Horária</label><br>
                <input type="text" name="cargahoraria" id="cargahoraria" value="<?php echo $curso[0]->cargahoraria; ?>" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <label>Ementa</label><br>
                <textarea class="form-control" name="ementa" id="ementa"><?php echo $curso[0]->ementa; ?> </textarea>
            </div>
            <div class="form-group col-md-4">
                <label>Bibliografia</label><br>
                <textarea class="form-control" name="bibliografia" id="bibliografia"><?php echo $curso[0]->bibliografia ?></textarea>
            </div>
            <div class="form-group col-md-12">
                <label>Modo Curso</label><br>
                <label>Presencial</label>
                <input type="radio" id="mod1" name="modocurso" value="presencial" required>
                <label>Distância</label>
                <input type="radio" id="mod2" name="modocurso" value="distancia">
            </div>
            <div class="form-group col-md-6">
                <label>Origem Curso</label><br>
                <input type="text" name="origem" id="origem" value="<?php echo $curso[0]->origemcurso; ?>" class="form-control">
            </div><br>
            <div class="form-group col-md-6">
                <label>Situação do Curso</label><br>
                <label>Ativo</label>
                <input type="radio" id="sit1" name="situacao" value="ativo">
                <label>Inativo</label>
                <input type="radio" id="sit2" name="situacao" value="inativo">
            </div>

            <div class="col-md-12">
                <input type="submit" value="Atualizar"  class="btn btn-default">
            </div>
        </form>
    </div>
    <script src="<?php echo base_url('assets/js/curso.js'); ?>"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var radiosModoCurso = document.getElementsByName("modocurso");
            //Verificando o retorno do  banco e marcando o valor correto do modocurso
            for (var i = 0; i < radiosModoCurso.length; i++) {
                if (radiosModoCurso[i].value == "presencial") {
                    if ("<?php echo $modocurso; ?>" == "presencial") {
                        radiosModoCurso[i].checked = true;
                    }
                }

                if (radiosModoCurso[i].value == "presencial") {
                    if ("<?php echo $modocurso; ?>" == "distancia") {
                        radiosModoCurso[i].checked = true;
                    }
                }
            }
            i = 0;
            //
            var radiosSituacao = document.getElementsByName("situacao");
            for (var i = 0; i < radiosSituacao.length; i++) {
                if (radiosSituacao[i].value == "ativo") {
                    if ("<?php echo $textoSituacao; ?>" == "ativo") {
                        radiosSituacao[i].checked = true;
                    }
                }

                if (radiosSituacao[i].value == "inativo") {
                    if ("<?php echo $textoSituacao; ?>" == "inativo") {
                        radiosSituacao[i].checked = true;
                    }
                }
            }
        });

    </script>
</div>
<?php $this->load->view('uteis/rodape'); ?>
<?php
    $this->load->view('uteis/cabecalho');
    $this->load->view('login/menu_unico');
?>
    <div class="container-fluid" >
        <div class="row-fluid">
            <?php echo validation_errors(); ?>
            <h2>Atualização da Grade selecionada</h2>
            <form action="<?php echo base_url('Grade/AtualizarGrade'); ?>" method="post">
                <div class="form-group col-md-12">
                    <label>Código da Grade</label><br>
                    <input type="text" name="gradeid" class="form-control" required>
                </div>

                <div class="form-group col-md-6">
                    <label>Curso</label>
                    <?php
                        $arrayCurso = array('' => 'Escolha');
                        foreach ($cursos as $curso)
                        $arrayCurso[$curso->cursoid] = $curso->cursonome;
                        echo form_dropdown('cursos', $arrayCurso);
                    ?>
                </div>

                <div class="form-group col-md-12">
                    <label for="turma">Turma</label>
                    <?php
                    $arrayTurma = array('' => 'Escolha');
                    foreach ($turmas as $turma)
                        $arrayTurma[$turma->turmaid] = $turma->turmanome;
                    echo form_dropdown('turma', $arrayTurma);
                    ?>
                </div>

                <div class="form-group col-sm-6">
                    <label for="semestreano">Semestre ou Ano</label>
                    <input type="text" name="semestreano" value="<?php echo $grade[0]->semestreano; ?>" class="form-control">
                </div><br>

                <div class="form-group col-md-7">
                    <label>Carga Horária</label><br>
                    <input type="number" name="cargahoraria" value="<?php echo $grade[0]->cargahoraria; ?>class="form-control">
                </div><br>

                <div class="form-group col-md-12">
                    <label>Dia da Semana</label>
                    <select name="diasemana">
                        <option value="Domingo">Domingo</option>
                        <option value="Segunda-Feira">Segunda</option>
                        <option value="Terça-Feira">Terça</option>
                        <option value="Quarta-Feira">Quarta</option>
                        <option value="Quinta-Feira">Quinta</option>
                        <option value="Sexta-Feira">Sexta</option>
                        <option value="sabado">sábado</option>
                    </select>
                </div>

                <div class="form-group col-md-12">
                    <label>Disciplina</label>
                        <?php
                        $arrayDisciplina = array('' => 'Escolha');
                        foreach ($disciplinas as $disciplina)
                            $arrayDisciplina[$disciplina->disciplinaid] = $disciplina->nome;
                        echo form_dropdown('disciplina', $arrayDisciplina);
                        ?>
                </div>

                <div class="form-group col-md-6">
                    <label for="datavalidade">Data de Validade</label>
                    <input type="date" name="datavalidade" value="<?php echo date('d/m/Y', strtotime($grade[0]->datavalidade)); ?>" value="inativo">
                </div>

                <div class="col-md-12">
                    <input type="submit" value="Atualizar" class="btn btn-default">
                </div>
            </form>
        </div>

    </div>
<?php $this->load->view('uteis/rodape'); ?>
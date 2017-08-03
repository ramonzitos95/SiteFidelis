
<?php foreach ($disciplinas as $d) {
    If ($d['situacaodisciplina'] == true) {
        $txtSituacao = "Ativo";
    } else {
        $txtSituacao = "Inativo";
    }
    ?>
    <tr>
        <td colspan="1"><?php echo $d['nome']; ?></td>
        <td colspan="1"><?php echo $d['professor']; ?></td>
        <td colspan="1"><?php echo $d['cargahoraria']; ?></td>
        <td colspan="1"><?php echo $d['modalidade']; ?></td>
        <td colspan="1"><?php echo $txtSituacao ?></td>
        <td colspan="1">
            <a href="<?php echo base_url('Disciplina/Alteracao/' . $d['disciplinaid']); ?>"
               class="btn btn-large btn-primary">Editar Disciplina</a>
        </td>
        <td colspan="1">
            <a href="<?php echo base_url('Disciplina/DeletarDisciplina/' . $d['disciplinaid']); ?> ?>"
               class="btn btn-large btn-primary">Excluir Disciplina</a>
        </td>
    </tr>
<?php } ?>

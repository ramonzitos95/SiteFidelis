
<?php foreach($cursos as $curso) {
    If($curso['situacao'] == true){
        $txtSituacao = "Ativo";
    } else {
        $txtSituacao = "Inativo";
    }
    ?>
<tr>
    <td colspan="1"><?php echo $curso['cursonome']; ?></td>
        <td colspan="1"><?php echo $curso['cargahoraria']; ?></td>
        <td colspan="1"><?php echo $curso['modocurso']; ?></td>
        <td colspan="1"><?php echo $curso['origemcurso']; ?></td>
        <td colspan="1"><?php echo $txtSituacao ?></td>
        <td colspan="1">
            <a href="<?php echo base_url('Curso/Alteracao/'. $curso['cursoid']); ?>" class="btn btn-large btn-primary">Editar Curso</a>
        </td>
        <td colspan="1">
            <a href="<?php echo base_url('Curso/DeletarCurso/'. $curso['cursoid']); ?>" class="btn btn-large btn-primary">Excluir Curso</a>
        </td>
</tr>
<?php } ?>

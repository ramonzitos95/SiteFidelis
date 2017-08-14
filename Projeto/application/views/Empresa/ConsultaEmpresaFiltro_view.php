
<?php foreach ($empresas as $e) { ?>
    <tr>
        <td colspan="2"><?php echo $e->razaosocial; ?></td>
        <td colspan="1"><?php echo $e->cnpj; ?></td>
        <td colspan="1"><?php echo $e->cep; ?></td>
        <td colspan="1"><?php echo $e->telefone; ?></td>
        <td colspan="1"><?php echo $e->cidade; ?></td>
        <td colspan="1"><?php echo $e->estado; ?></td>
        <td colspan="1">
            <a href="<?php echo base_url('Empresa/Alteracao/' . $e->empresaid); ?>"
               class="btn btn-large btn-primary">Editar Empresa</a>
        </td>
        <td colspan="1">
            <a href="<?php echo base_url('Empresa/DeletarEmpresa/' . $e->empresaid); ?>"
               class="btn btn-large btn-primary">Excluir Empresa</a>
        </td>
    </tr>
<?php } ?>

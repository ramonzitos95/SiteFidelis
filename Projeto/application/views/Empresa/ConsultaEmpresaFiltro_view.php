
<?php foreach ($empresas as $empresa) { ?>
    <tr>
        <td colspan="2"><?php echo $empresa->razaosocial; ?></td>
        <td colspan="1"><?php echo $empresa->cnpj; ?></td>
        <td colspan="1"><?php echo $empresa->cep; ?></td>
        <td colspan="1"><?php echo $empresa->telefone; ?></td>
        <td colspan="1"><?php echo $empresa->cidade; ?></td>
        <td colspan="1"><?php echo $empresa->estado; ?></td>
        <td colspan="1">
            <a href="<?php echo base_url('Empresa/Alteracao/' . $empresa->empresaid); ?>"
               class="btn btn-large btn-primary">Editar Empresa</a>
        </td>
        <td colspan="1">
            <a href="<?php echo base_url('Empresa/DeletarEmpresa/' . $empresa->empresaid); ?>"
               class="btn btn-large btn-primary">Excluir Empresa</a>
        </td>
    </tr>
<?php } ?>

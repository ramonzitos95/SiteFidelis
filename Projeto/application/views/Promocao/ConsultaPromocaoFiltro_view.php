
<?php foreach ($promocoes as $p) { ?>
    <tr>
        <td colspan="2"><?php echo $p->razaosocial; ?></td>
        <td colspan="1"><?php echo $p->cnpj; ?></td>
        <td colspan="1"><?php echo $p->cep; ?></td>
        <td colspan="1"><?php echo $p->telefone; ?></td>
        <td colspan="1"><?php echo $p->cidade; ?></td>
        <td colspan="1"><?php echo $p->estado; ?></td>
        <td colspan="1">
            <a href="<?php echo base_url('Empresa/Alteracao/' . $p->promocaoid); ?>"
               class="btn btn-large btn-primary">Editar Empresa</a>
        </td>
        <td colspan="1">
            <a href="<?php echo base_url('Empresa/DeletarEmpresa/' . $p->promocaoid); ?>"
               class="btn btn-large btn-primary">Excluir Empresa</a>
        </td>
    </tr>
<?php } ?>

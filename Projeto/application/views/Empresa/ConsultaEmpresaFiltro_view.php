
<?php foreach ($empresas as $e) { ?>
    <tr>
        <td colspan="2"><?php echo $promocao->descricaopromocao; ?></td>
        <td colspan="1"><?php echo date_format(new DateTime($promocao->datavalidade) , 'd/m/Y'); ?></td>
        <td colspan="1"><?php echo $promocao->situacao; ?></td>
        <td colspan="1"><?php echo $promocao->produto; ?></td>
        <td colspan="1"><?php echo $promocao->valorproduto; ?></td>
        <td colspan="2"><?php
            $caminho_completo = trim($promocao->foto);
            $arquivo = trim($promocao->arquivo);

            $caminho_ext = base_url($caminho_completo . '/' . $arquivo);

            if (!empty($caminho_ext) && $arquivo != ""){
                echo '<img src='.$caminho_ext.' width="150" height="75" />';
            }
            ?></td>
        <td colspan="1">
            <a href="<?php echo base_url('Promocao/Alterar/' . $promocao->promocaoid); ?>"
               class="btn btn-large btn-primary">Editar Promoção</a>
        </td>
        <td colspan="1">
            <a href="<?php echo base_url('Promocao/DeletarPromocao/' . $promocao->promocaoid); ?>"
               class="btn btn-large btn-primary">Excluir Promoção</a>
        </td>
    </tr>
<?php } ?>

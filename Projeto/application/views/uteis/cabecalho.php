<!DOCTYPE html >
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/estilo.css'); ?>">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

    <!-- Optional theme -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-theme.min.css'); ?>">
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-mask.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#cep").mask("99999-999");
            $("#telefone").mask("(99)9999-9999");
            $("#celular").mask("(99)9999-9999");
            $("#datanascimento").mask("99/99/9999");
            $("#rg").mask("9.999.999");
            $("#cpf").mask("999.999.999-99");
            $("#cnpj").mask("99.999.999/9999-99");
        })
    </script>
</head>
<!-- <body class="imagemIndex"> -->
<div class="row-fluid col-sm-offset-1">

<!--    --><?php
//    echo 'Horário Atual:';
//    date_default_timezone_set('America/Sao_Paulo');
//    $date = date('Y-m-d H:i');
//    $nome = $this->session->userdata('usuario_logado');
//    echo '<div class="text-primary">' . $date . '</div>';
//    If ($nome != null) {
//        echo '<div class="text-info">' . 'Usuário Logado: ' . $nome. '</div>';
//
//    ?>
<!--    -->
</div>




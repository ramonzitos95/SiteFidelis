<?php
$this->load->view('uteis/cabecalho');
?>


<div class="container-fluid" xmlns="http://www.w3.org/1999/html">

    <div class="row-fluid">
        <?php echo validation_errors(); ?>
        <h2 div="topo">Cadastro de Pessoas</h2>
        <div class="alert alert-info" id="erros" style="display: none">

        </div>
        <form action="<?php echo base_url('Pessoa/cadastro'); ?>" id="form" method="post">
            <div class="form-group col-md-12">
                <label for="turma">Turma</label>
                <?php
                $arrayTurma = array('' => 'Escolha');
                foreach ($turmas as $turma)
                    $arrayTurma[$turma->turmaid] = $turma->turmanome;
                echo form_dropdown('turma', $arrayTurma);
                ?>
            </div>
            <div class="form-group col-md-6">
                <label>Nome</label>
                <input type="text" name="nome" id="nome" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>RG</label>
                <input type="text" name="rg" id="rg" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>CEP</label>
                <input type="text" name="cep" id="cep" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Endereço</label>
                <input type="text" name="endereco" id="endereco" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Email</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Cidade</label>
                <input type="text" name="Cidade" id="cidade" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Bairro</label>
                <input type="text" name="bairro" id="bairro" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Estado</label>
                <?php
                $arrayEstado = array('' => 'Escolha');
                foreach ($estados as $estado)
                    $arrayEstado[$estado->id] = $estado->nome;
                echo form_dropdown('estados', $arrayEstado);
                ?>
            </div>
            <label>Cidade</label>
            <?php echo form_dropdown('cidade', array('' => 'Escolha um Estado'), '', 'id="cidade"'); ?>

            <div class="form-group col-md-6">
                <label>Telefone</label>
                <input type="tel" name="telefone" id="telefone" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Celular</label>
                <input type="tel" name="celular" id="celular" class="form-control">
            </div>
            <div class="form-group col-sm-4">
                <label>Estado Civil</label> <br>
                <label>Solteiro</label>
                <input type="radio" name="estadocivil" class="radio-inline" value="solteiro">
                <label>Casado</label>
                <input type="radio" name="estadocivil" class="radio-inline" value="casado">
                <label>Divorciado</label>
                <input type="radio" name="estadocivil" class="radio-inline" value="divorciado">
                <label>Viúva</label>
                <input type="radio" name="estadocivil" class="radio-inline" value="viuva">
            </div>
            <div class="form-group col-md-4">
                <label>Data de Nascimento</label>
                <input type="date" name="datanascimento" id="datanascimento" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label>Grau de Escolaridade</label>
                <input type="text" name="grauescolar" id="grauescolar" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Disciplina Extra</label>
                <input type="text" name="extra" id="disciplinaextra" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Naturalidade</label>
                <input type="text" name="naturalidade" id="naturalidade" class="form-control">
            </div>
            <div class="form-group col-md-8">
                <label>Nº Matricula</label>
                <input type="text" name="matricula" id="matricula" class="form-control">
            </div>
            <div class="col-md-6 ">
                <input type="submit" value="Cadastrar" class="btn btn-default" id="btn_cadastro" name="btn_cadastro">
            </div>
        </form>
        <div class="col-md-6">
            <a href="<?php echo base_url('Login'); ?>" class="alert-link">Logout</a>
        </div>
    </div>
    <script src="<?php echo base_url('assets/js/pessoa.js'); ?>"></script>
    <script type="text/javascript">

        $("#cep").blur(function () {
            var cep = $('#cep').val();
            cep = cep.replace('-', '');
            if (cep == '') {
                alert('Informe o CEP antes de continuar');
                $('#cep').focus();
                return false;
            }
            $('#btn_consulta').html('Aguarde...');
            $.post('http://localhost/CodeigniterBase/Projeto/Cep/Consulta',
                {
                    cep: cep
                },
                function (dados) {
                    $('#endereco').val(dados.logradouro);
                    $('#bairro').val(dados.bairro);
                    $('#cidade').val(dados.localidade);
                    $('#estado').val(dados.uf);
                    $('#btn_cadastro').html('Consultar');
                }, 'json');
        });

        $("#estado").blur(function{
            var id_cidade = $("#estado").val($estado.id);
            $('#btn_consulta').html('Carregando cidades...');
            $.post('http://localhost/CodeigniterBase/Projeto/Cep/'
            {
                id_cidade : id_cidade;
            },
            function (dados) {
                $.('#cidade').val(dados.nome)
            }, json);

        });


    </script>
</div>
<?php $this->load->view('uteis/cabecalho'); ?>
    <div class="container-fluid">
        <nav class="navbar navbar-default">
            <div class="container-fluid">


                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url('menu'); ?> ">Site Fidelis</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">Empresa <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('Empresa'); ?>">Cadastrar</a></li>
                                <li><a href="<?php echo base_url('Empresa/Consultar')?>">Listar Empresas</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">Turma<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('Turma'); ?>">Cadastrar</a></li>
                                <li><a href="<?php echo base_url('Turma/Consulta'); ?>">Listar Turmas</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">Disciplina <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('Disciplina'); ?>">Cadastrar</a></li>
                                <li><a href="<?php echo base_url('Disciplina/Consulta'); ?>">Listar Disciplinas</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">Grade <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('Grade')?>">Cadastrar</a></li>
                                <li><a href="<?php echo base_url('Grade/Consultar')?>">Listar Grades</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">Administrador <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('login/cadastrar'); ?>">Cadastrar Usuários</a></li>
                                <li><a href="<?php echo base_url('Pessoa'); ?>">Cadastrar Pessoas</a></li>
                            </ul>
                        </li>
                        <li><a href="sobre.php">Sobre</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
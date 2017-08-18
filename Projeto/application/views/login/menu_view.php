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
                    <a class="navbar-brand" href="<?php echo base_url('Menu'); ?> ">Site Fidelis</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">Empresa <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('Empresa'); ?>">Cadastrar</a></li>
                                <li><a href="<?php echo base_url('Empresa/Alterar'); ?>">Atualizar Dados</a></li>
                                <li><a href="<?php echo base_url('Empresa/Consultar')?>">Consultar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">Promoções <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('Promocao')?>">Cadastrar</a></li>
                                <li><a href="<?php echo base_url('Promocao/CadastroPromocao_View')?>">Cadastrar</a></li>
                                <li><a href="<?php echo base_url('Promocao/Consultar')?>">Consultar</a></li>
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
                        <?php if(isset($email) and $email != null){ ?>
                            <li><a href="#">Usuário: <?php echo $email; ?></a></li>
                        <?php }
                            echo $this->session->userdata('usuario_id');
                        ?>

                        <?php if(isset($empresa_nome) and $empresa_nome != null){ ?>
                          <li><a href="<?php echo $site ?>" target="_blank">Empresa: <?php echo 
                          $empresa_nome; ?></a></li>
                        <?php } ?>
                        <li><a href="<?php echo base_url('Logout'); ?>">Logout</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
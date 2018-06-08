<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8" />        
        <meta name="author" content="Michael Douglas Soares">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <title>UTP Mais Saudável</title>
        <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo URL; ?>/assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/fullcalendar.css">
        <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/custom.min.css">
        <script type="text/javascript">var URL = '<?php echo URL; ?>';</script>   
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/bootstrap/bootstrap.min.js"></script>
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="<?php echo URL; ?>/home" class="site_title"><i class="fa fa-heartbeat"></i> <span>Fisioterapia</span></a>
                        </div>
                        <div class="clearfix"></div>

                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-calendar"></i> Agendamentos <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo URL; ?>/agendamentos/cadastrar">Cadastrar</a></li>
                                            <li><a href="<?php echo URL; ?>/agendamentos/visualizar">Visualizar</a></li>
                                        </ul>
                                    </li>
                                    <?php if ($_SESSION['usuario']['id_perfil'] == Perfis::ADMINISTRADOR || $_SESSION['usuario']['id_perfil'] == Perfis::COORDENADOR || $_SESSION['usuario']['id_perfil'] == Perfis::FISIOTERAPEUTA) : ?>
                                        <li><a><i class="fa fa fa-heart"></i> Especialidades <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="<?php echo URL; ?>/especialidades/cadastrar">Cadastrar</a></li>
                                                <li><a href="<?php echo URL; ?>/especialidades/visualizar">Visualizar</a></li>
                                            </ul>
                                        </li>
                                    <?php endif ?>
                                    <li><a><i class="fa fa-file-text-o"></i> Formulários <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo URL; ?>/formularios/cadastrar">Cadastrar</a></li>
                                            <li><a href="<?php echo URL; ?>/formularios/visualizar">Visualizar</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-bar-chart"></i> Relatórios <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo URL; ?>/relatorios/cadastrar">Cadastrar</a></li>
                                            <li><a href="<?php echo URL; ?>/relatorios/visualizar">Visualizar</a></li>
                                        </ul>
                                    </li>
                                    <?php if ($_SESSION['usuario']['id_perfil'] == Perfis::COORDENADOR || $_SESSION['usuario']['id_perfil'] == Perfis::ADMINISTRADOR) : ?>
                                        <li><a><i class="fa fa-users"></i> Pessoas <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="<?php echo URL; ?>/pessoas/cadastrar">Cadastrar</a></li>
                                                <li><a href="<?php echo URL; ?>/pessoas/visualizar">Visualizar</a></li>
                                                <li><a href="<?php echo URL; ?>/pessoas/inativas">Inativas</a></li>
                                            </ul>
                                        </li>
                                    <?php endif ?>
                                    <?php if ($_SESSION['usuario']['id_perfil'] == Perfis::ADMINISTRADOR) : ?>
                                        <li><a><i class="fa fa-user-plus"></i> Perfis <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="<?php echo URL; ?>/perfis/cadastrar">Cadastrar</a></li>
                                                <li><a href="<?php echo URL; ?>/perfis/visualizar">Visualizar</a></li>
                                            </ul>
                                        </li>
                                        <li><a><i class="fa fa-arrow-up"></i> URLs <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="<?php echo URL; ?>/urls/cadastrar">Cadastrar</a></li>
                                                <li><a href="<?php echo URL; ?>/urls/visualizar">Visualizar</a></li>
                                            </ul>
                                        </li>
                                    <?php endif ?>

                                    <li><a><i class="fa fa fa-wheelchair"></i> Pacientes <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <?php if ($_SESSION['usuario']['id_perfil'] == Perfis::ADMINISTRADOR || $_SESSION['usuario']['id_perfil'] == Perfis::COORDENADOR || $_SESSION['usuario']['id_perfil'] == Perfis::FISIOTERAPEUTA || $_SESSION['usuario']['id_perfil'] == Perfis::SECRETARIA) : ?>                            
                                                <li><a href="<?php echo URL; ?>/pacientes/cadastrar">Cadastrar</a></li>
                                            <?php endif ?>
                                            <li><a href="<?php echo URL; ?>/pacientes/visualizar">Visualizar</a></li>
                                        </ul>
                                    </li>                                    
                                    <li><a><i class="fa fa-hospital-o"></i> Unidades de Saúde <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <?php if ($_SESSION['usuario']['id_perfil'] == Perfis::ADMINISTRADOR || $_SESSION['usuario']['id_perfil'] == Perfis::COORDENADOR || $_SESSION['usuario']['id_perfil'] == Perfis::FISIOTERAPEUTA) : ?>                            
                                                <li><a href="<?php echo URL; ?>/unidades/cadastrar">Cadastrar Unidade</a></li>
                                            <?php endif; ?>
                                            <li><a href="<?php echo URL; ?>/unidades/visualizar">Visualizar Unidades</a></li>

                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-plus-square"></i> Regionais <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <?php if ($_SESSION['usuario']['id_perfil'] == Perfis::ADMINISTRADOR || $_SESSION['usuario']['id_perfil'] == Perfis::COORDENADOR || $_SESSION['usuario']['id_perfil'] == Perfis::FISIOTERAPEUTA) : ?>                            
                                                <li><a href="<?php echo URL; ?>/unidades/regional">Cadastrar Regional</a></li>
                                            <?php endif; ?>
                                            <li><a href="<?php echo URL; ?>/unidades/regionais">Visualizar Regionais</a></li>                                            
                                        </ul>
                                    </li>                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="images/michael.png" alt="">Olá, <?= $_SESSION['usuario']['nome_pessoa'] ?>
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="<?php echo URL; ?>/pessoas/perfil"><i class="fa fa-user pull-right"></i> Meu Perfil</a></li>
                                        <li><a href="<?php echo URL; ?>/login/logout"><i class="fa fa-sign-out pull-right"></i> Sair </a></li>
                                    </ul>
                                </li>

                                <li role="presentation" class="dropdown">
                                    <a id="notificacao" href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="badge bg-green">5</span>
                                    </a>
                                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                        <li>
                                            <a>                                                
                                                <span>
                                                    <span>MICHAEL DOUGLAS</span>
                                                    <span class="time">10 minutos atrás</span>
                                                </span>
                                                <span class="message">
                                                    Um novo paciente foi vinculado à sua agenda.
                                                </span>
                                            </a>
                                        </li>                                        
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="right_col" role="main">
                    <?= $this->loadViewInTemplate($viewName, $viewData); ?>
                </div>                               
            </div>
            <footer>
                <div class="pull-right">
                    UTP Mais Saudável - Todos os direitos reservados
                </div>
                <div class="clearfix"></div>
            </footer>
        </div>
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/sweetAlert/sweetAlert.js"></script>                
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/custom.min.js"></script>        
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/validator/validator.js"></script>        
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/jquery/jquery.inputmask.bundle.min.js"></script>  
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/datatable/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/datatable/dataTables.buttons.min.js"></script>                
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/datatable/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/datatable/i18n.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/fullcalendar/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/fullcalendar/fullcalendar.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/fullcalendar/pt-br.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/agendas/agendas.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/Chart.min.js"></script>
    </body>
</html>

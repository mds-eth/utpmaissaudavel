<?php if ($_SESSION['usuario']['id_perfil'] == Perfis::ALUNO) : ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Agenda pacientes</h2>                
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div id="calendario"></div>                                                   
                </div>
            </div>
        </div>
    </div>
    <div id="modal-paciente-selecionado" tabindex="-1" class="modal fade" role="dialog">
        <div class="modal-dialog">                
            <div class="modal-content" style="border-radius: 10px">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sessão Paciente</h4>
                </div>
                <form id="form">
                    <div class="modal-body" id="body-modal-paciente-selecionado">       
                    </div>                        
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancelar</button>
                    <button id="btn-modal-iniciar-sessao-paciente" class="btn btn-success btn-xs">Iniciar sessão</button>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-pacientes-sem-agendamento" tabindex="-1" class="modal fade" role="dialog">
        <div class="modal-dialog">                
            <div class="modal-content" style="border-radius: 10px">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Relação de pacientes sem agendamento</h4>
                </div>
                <form id="form">
                    <div class="modal-body" id="body-modal-pacientes-sem-agendamento">       
                    </div>                        
                </form>
                <div class="modal-footer">                    
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ($_SESSION['usuario']['id_perfil'] == Perfis::ADMINISTRADOR || $_SESSION['usuario']['id_perfil'] == Perfis::SECRETARIA || $_SESSION['usuario']['id_perfil'] == Perfis::COORDENADOR || $_SESSION['usuario']['id_perfil'] == Perfis::FISIOTERAPEUTA): ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Pacientes cadastrados sem agendamento</h2>            
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="text-align: center">
                        <thead>
                            <tr>
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">Paciente</th>                                
                                <th style="text-align: center">Email</th>
                                <th style="text-align: center">Unidade de Saúde</th>
                                <th style="text-align: center">Data Cadastro</th>  
                                <?php if ($_SESSION['usuario']['id_perfil'] == Perfis::ADMINISTRADOR || $_SESSION['usuario']['id_perfil'] == Perfis::SECRETARIA): ?>
                                    <th style="text-align: center">Ações</th>  
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pacientes as $paciente) : ?>
                                <tr>
                                    <td><?= $paciente['id_pessoa'] ?></td>
                                    <td><?= $paciente['nome_pessoa'] ?></td>                                    
                                    <td><?= $paciente['email'] ?></td>
                                    <td><?= $paciente['nome_unidade'] ?></td>                                    
                                    <?php $data = $paciente['pessoa_criado_em'] ?>
                                    <td><?= date('d/m/Y', strtotime($data)) ?></td>
                                    <?php if ($_SESSION['usuario']['id_perfil'] == Perfis::ADMINISTRADOR || $_SESSION['usuario']['id_perfil'] == Perfis::SECRETARIA): ?>
                                        <td>
                                            <a href="<?php echo URL ?>/agendamentos/existentes/<?= $paciente['id_pessoa'] ?>" id="<?= $paciente['id_pessoa'] ?>" class="home-agendar-paciente btn btn-info btn-xs editar">Agendar</a>                                            
                                        </td>
                                    <?php endif; ?>
                                </tr>                    
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>            
<?php endif; ?>
<?php if ($_SESSION['usuario']['id_perfil'] == Perfis::ADMINISTRADOR || $_SESSION['usuario']['id_perfil'] == Perfis::COORDENADOR || $_SESSION['usuario']['id_perfil'] == Perfis::FISIOTERAPEUTA): ?>
    <!-- <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pacientes por regionais</h2>                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pacientes por unidades de saúde</h2>                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <canvas id="mybarChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pacientes por faixa etária</h2>                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <canvas id="canvasDoughnut"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pacientes por especialidade</h2>                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <canvas id="canvasRadar"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Média de usuários do sistema</h2>                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <canvas id="polarArea"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pacientes por sexo</h2>                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
    </div>-->
<?php endif; ?>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/home/home.js"></script>
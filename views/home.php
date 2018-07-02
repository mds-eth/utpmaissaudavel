<?php if ($_SESSION['usuario']['id_perfil'] == Perfis::SECRETARIA || $_SESSION['usuario']['id_perfil'] == Perfis::ALUNO) : ?>
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
<?php endif; ?>
<?php if ($_SESSION['usuario']['id_perfil'] == Perfis::ADMINISTRADOR || $_SESSION['usuario']['id_perfil'] == Perfis::COORDENADOR || $_SESSION['usuario']['id_perfil'] == Perfis::FISIOTERAPEUTA): ?>
    <div class="row">
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
    </div>
<?php endif; ?>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/home/home.js"></script>
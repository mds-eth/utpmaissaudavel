<div class="form-horizontal">   
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Arraste o paciente para o dia desejado</h2>                
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="x_content" id="pacientes">                        
                    </div>
                </div>                
            </div>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Agenda semestral por especialidade</h2>                
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="x_content">
                        <?php if (isset($segunda)): ?>
                            <span><?= '<b>Início: </b> ' . $segunda[0]['data_inicio_agenda'] . '<br> <b>Fim: </b> ' . $segunda[0]['data_fim_agenda'] . '<br><b>Semestre: </b>' . $segunda[0]['semestre'] . '/' . date('Y'); ?></span><br><br><br>
                            <div class="table-responsive">
                                <span><b>Segunda</b>: </span>
                                <?php foreach ($segunda as $seg): ?>
                                    <span><?= $seg['especialidade'] . ' |' ?></span>
                                <?php endforeach; ?><br>
                                <span><b>Terça</b>: </span>
                                <?php foreach ($terca as $ter): ?>
                                    <span><?= $ter['especialidade'] . ' |' ?></span>
                                <?php endforeach; ?><br>
                                <span><b>Quarta</b>: </span>
                                <?php foreach ($quarta as $qua): ?>
                                    <span><?= $qua['especialidade'] . ' |' ?></span>
                                <?php endforeach; ?><br>
                                <span><b>Quinta</b>: </span>
                                <?php foreach ($quinta as $qui): ?>
                                    <span><?= $qui['especialidade'] . ' |' ?></span>
                                <?php endforeach; ?><br>
                                <span><b>Sexta</b>: </span>
                                <?php foreach ($sexta as $sex): ?>
                                    <span><?= $sex['especialidade'] . ' |' ?></span>
                                <?php endforeach; ?><br>
                            </div>
                        <?php else: ?>
                            <h4>Agenda semestral ainda não definida!</h4>
                        <?php endif; ?>
                    </div>
                </div>                
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Agenda</h2>                
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div id="vincularPacienteAgenda"></div>                                                   
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/agendas/agendas.js"></script>
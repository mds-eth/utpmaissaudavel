<div class="form-horizontal">   
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h5><b>Realize o agendamento para o paciente abaixo, de acordo com sua especialidade</b></h5>            
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="paciente">Paciente</label>
                        <div class="col-md-8">
                            <input type="hidden" id="idPaciente" name="idPaciente">
                            <input type="text" id="paciente" name="paciente" readonly="true" class="form-control col-md-7 col-xs-12">
                        </div>                    
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="especialidade">Especialidade(s)</label>
                        <div class="col-md-8">                            
                            <input type="text" id="especialidade" name="especialidade" readonly="true"  class="form-control col-md-7 col-xs-12">
                        </div>                    
                    </div>
                    <div class="item form-group">                        
                        <label class="col-md-3 col-sm-3 col-xs-12" for="aluno">Alunos</label>
                        <div class="col-md-8">
                            <select class="aluno form-control" id="aluno" name="aluno">
                                <option >Selecione</option>
                                <?php foreach ($alunos as $aluno) : ?>
                                    <option value="<?= $aluno['id_pessoa'] ?>"><?= $aluno['nome_pessoa'] . ' - Qt pacientes -> ' . 2 ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div> 
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="dataInicio">Data/Hora início</label>
                        <div class="col-md-8">                            
                            <input type="text" id="dataInicio" name="dataInicio" readonly="true" required="required" class="form-control col-md-7 col-xs-12">
                        </div>                    
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="dataFim">Data/Hora fim</label>
                        <div class="col-md-8">                            
                            <input type="text" id="dataFim" name="dataFim" readonly="true" required="required" class="form-control col-md-7 col-xs-12">
                        </div>                    
                    </div>
                    <div id="botaoGravar"></div>
                </div>                
            </div>

            <div class="x_panel">
                <div class="x_title">
                    <h5><b>Agenda semestral por especialidade</b></h5>
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
        <div class="col-md-6 col-sm-12 col-xs-12" style="height: 100%">
            <div class="x_panel">
                <div class="x_title">
                    <h5><b>Agenda</b></h5>                
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div id="vincularPacienteAgenda"></div>                                                   
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modalConfirmarAgenda" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog">                
        <div class="modal-content" style="border-radius: 10px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirmar Agenda Paciente</h4>
            </div>
            <form id="form">
                <div class="modal-body" id="bodyModalConfirmarAgenda">       
                </div>                        
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancelar</button>
                <button id="btnConfirmarAgendaPaciente" class="btn btn-success btn-xs">Salvar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/agendas/agendas.js"></script>
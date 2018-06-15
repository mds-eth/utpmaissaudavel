<div class="clearfix"></div>    
<div class="form-horizontal">   
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Basta arrastar paciente para o dia desejado</h2>                
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="x_content" id="paciente">                    
                        <button value="<?= $paciente[0]['id_pessoa'] ?>" class="btn btn-success btn-xs"><?= $paciente[0]['nome_pessoa'] ?></button>
                    </div>
                </div>
                <div class="x_content">
                    <div class="x_content">                    

                    </div>
                </div>
            </div>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Agenda Semestral</h2>                
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="x_content">                    
                        <span><?= '<b>Início</b> ' . $agendaEspecialidades[0]['data_inicio_agenda'] . ' <b>Fim</b> ' . $agendaEspecialidades[0]['data_fim_agenda'] ?></span><br><br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">Segunda</th>
                                        <th style="text-align: center">Terça</th>
                                        <th style="text-align: center">Quarta</th>
                                        <th style="text-align: center">Quinta</th>                            
                                        <th style="text-align: center">Sexta</th>                                                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($agendaEspecialidades as $agenda) : ?>                                        
                                        <tr>
                                            <td><?= $agenda['fk_id_agenda_dias'] == $agenda['id_agenda_dias'] && $agenda['id_agenda_dias'] == 1 ? $agenda['especialidade'] : '---' ?></td>                                
                                            <td><?= $agenda['fk_id_agenda_dias'] == $agenda['id_agenda_dias'] && $agenda['id_agenda_dias'] == 2 ? $agenda['especialidade'] : '---' ?></td>
                                            <td><?= $agenda['fk_id_agenda_dias'] == $agenda['id_agenda_dias'] && $agenda['id_agenda_dias'] == 3 ? $agenda['especialidade'] : '---' ?></td>
                                            <td><?= $agenda['fk_id_agenda_dias'] == $agenda['id_agenda_dias'] && $agenda['id_agenda_dias'] == 4 ? $agenda['especialidade'] : '---' ?></td>
                                            <td><?= $agenda['fk_id_agenda_dias'] == $agenda['id_agenda_dias'] && $agenda['id_agenda_dias'] == 5 ? $agenda['especialidade'] : '---' ?></td>                                
                                        </tr>                    
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="x_content">
                    <div class="x_content">                    

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
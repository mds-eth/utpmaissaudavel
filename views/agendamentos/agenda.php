<h4>Calendário Especialidades</h4>
<div class="clearfix"></div>
<div class="form-horizontal">    
    <div class="x_panel">
        <div class="x_title">  
            <div class="clearfix"></div>
            <div class="item form-group">
                <label class="col-md-1 col-sm-3 col-xs-12" for="dataInicial">Data início</label>
                <div class="col-md-2">
                    <input id="dataInicial" name="dataInicial" class="form-control" data-inputmask="'mask' : '99/99/9999'" />
                </div>   
                <label class="col-md-1 col-sm-3 col-xs-12" for="dataFinal">Data fim</label>
                <div class="col-md-2">
                    <input id="dataFinal" name="dataFinal" class="form-control" data-inputmask="'mask' : '99/99/9999'" />
                </div> 
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
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
                    <?php foreach ($especialidades as $especialidade) : ?>
                        <tr>
                            <td><input class="segunda" type="checkbox" id="<?= $especialidade['especialidade'] ?>" value="<?= $especialidade['id_especialidade'] ?>"> <?= $especialidade['especialidade'] ?></td>
                            <td><input class="terca" type="checkbox" id="<?= $especialidade['especialidade'] ?>" value="<?= $especialidade['id_especialidade'] ?>"> <?= $especialidade['especialidade'] ?></td>
                            <td><input class="quarta" type="checkbox" id="<?= $especialidade['especialidade'] ?>" value="<?= $especialidade['id_especialidade'] ?>"> <?= $especialidade['especialidade'] ?></td>
                            <td><input class="quinta" type="checkbox" id="<?= $especialidade['especialidade'] ?>" value="<?= $especialidade['id_especialidade'] ?>"> <?= $especialidade['especialidade'] ?></td>
                            <td><input class="sexta" type="checkbox" id="<?= $especialidade['especialidade'] ?>" value="<?= $especialidade['id_especialidade'] ?>"> <?= $especialidade['especialidade'] ?></td>
                        </tr>
                    <?php endforeach; ?>                        
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <div class="col-md-8">
                <button id="validar" class="btn btn-success btn-xs">Validar Agenda</button>                    
                <a href="<?php echo URL ?>/home"><button class="btn btn-danger btn-xs" type="button">Cancelar</button></a>
            </div>
        </div>             
    </div>    
</div>
<div id="modalAgendaEspecialidade" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog">                
        <div class="modal-content" style="border-radius: 10px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agenda por Especialidade</h4>
            </div>
            <form id="form">
                <div class="modal-body" id="bodyModalAgendaEspecialidade">       
                </div>                        
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancelar</button>
                <button id="btn-salvar-agenda-especialidade" class="btn btn-success btn-xs">Salvar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/agendas/agendas.js"></script>


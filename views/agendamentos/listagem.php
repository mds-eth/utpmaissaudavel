<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Agendas por Especialidades</h2>            
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered" style="text-align: center">
                    <thead>
                        <tr>
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">Semestre/Ano</th>
                            <th style="text-align: center">Data início</th>
                            <th style="text-align: center">Data Fim</th>                            
                            <th style="text-align: center">Status</th>                            
                            <th style="text-align: center">Ações</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($agendasEspecialidades as $agenda) : ?>
                            <tr>
                                <td><?= $agenda['id_agenda_dias_especialidades'] ?></td>                                
                                <td><?= $agenda['semestre'] . '/' . date('Y') ?></td>
                                <td><?= $agenda['data_inicio_agenda'] ?></td>
                                <td><?= $agenda['data_fim_agenda'] ?></td>
                                <td><?= $agenda['status'] == 1 ? 'Ativa' : 'Inativa' ?></td>                                
                                <td>
                                    <button class="btn btn-info btn-xs">Visualizar</button>                                    
                                </td>
                            </tr>                    
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="modalEditRegional" class="modal fade" role="dialog" >
    <div class="modal-dialog">                
        <div class="modal-content" style="border-radius: 10px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Registro</h4>
            </div>
            <form id="form">
                <div class="modal-body" id="formularioEdicao">       
                </div>                        
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancelar</button>
                <button id="btnModalEditarRegional" class="btn btn-success btn-xs">Editar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/unidades/unidades.js"></script>        
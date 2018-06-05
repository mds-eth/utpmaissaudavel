<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Pacientes</h2>        
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="datatable" style="text-align: center">
                    <thead>
                        <tr>
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">Nome</th>
                            <th style="text-align: center">Email</th>                            
                            <th style="text-align: center">Data Nascimento</th>                            
                            <th style="text-align: center">Convenio</th>    
                            <th style="text-align: center">Unidade de Saúde</th>
                            <th style="text-align: center">Data Entrada</th>
                            <th style="text-align: center">Ações</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pacientes as $paciente) : ?>
                            <tr>
                                <td style="text-align: center"><?= $paciente['id_pessoa'] ?></td>
                                <td style="text-align: center"><?= $paciente['nome_pessoa'] ?></td>
                                <td style="text-align: center"><?= $paciente['email'] ?></td>                                                            
                                <?php $nascimento = $paciente['data_nascimento'] ?>
                                <td style="text-align: center"><?= date('d/m/Y', strtotime($nascimento)) ?></td>                            
                                <td style="text-align: center"><?= $paciente['convenio'] ?></td>
                                <td style="text-align: center"><?= $paciente['nome'] ?></td>
                                <?php $data = $paciente['pessoa_criado_em'] ?>
                                <td style="text-align: center"><?= date('d/m/Y', strtotime($data)) ?></td>
                                <td style="text-align: center">
                                    <a href="<?php echo URL; ?>/pacientes/paciente/<?= $paciente['id_pessoa'] ?>" class="btn btn-success btn-xs">Abrir Ficha</a>
                                </td>                            
                            </tr>                    
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="modalFicha" class="modal fade" role="dialog" >
    <div class="modal-dialog">                
        <div class="modal-content" style="border-radius: 10px; width: 800px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ficha Paciente</h4>
            </div>
            <form id="form">
                <div class="modal-body" id="formularioEdicao">       
                </div>                        
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancelar</button>
                <button id="editar" class="btn btn-success btn-xs">Editar</button>
            </div>
        </div>
    </div>
</div>
<div id="modalDelete" class="modal fade" role="dialog">
    <div class="modal-dialog">                
        <div class="modal-content" style="border-radius: 10px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Excluir Registro</h4>
            </div>
            <form id="formDel">
                <div class="modal-body" id="pessoa">       
                </div>                        
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancelar</button>
                <button id="excluir" class="btn btn-success btn-xs">Excluir</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/pacientes/pacientes.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/jquery.mask.js"></script>

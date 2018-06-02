<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Pessoas Inativas</h2>            
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered" style="text-align: center">
                    <thead>
                        <tr>
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">Nome</th>
                            <th style="text-align: center">Email</th>
                            <th style="text-align: center">Perfil</th>                        
                            <th style="text-align: center">Criado Em</th>
                            <th style="text-align: center">Ações</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($inativas as $inativa) : ?>
                            <tr>
                                <td><?= $inativa['id_pessoa'] ?></td>
                                <td><?= $inativa['nome_pessoa'] ?></td>
                                <td><?= $inativa['email'] ?></td>
                                <td><?= $inativa['nome_perfil'] ?></td>                            
                                <?php $data = $inativa['criado_em'] ?>
                                <td><?= date('d/m/Y', strtotime($data)) ?></td>
                                <td>
                                    <button id="<?= $inativa['id_pessoa']; ?>" onclick="editar(this.id)"  class="editar btn btn-info btn-xs">Reativar</button>                                    
                                </td>                            
                            </tr>                    
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="modalEdit" class="modal fade" role="dialog" >
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
                <button id="btnEditar" class="btn btn-success btn-xs">Editar</button>
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
                <button id="btnExcluir" class="btn btn-success btn-xs">Excluir</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/pessoas/pessoas.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/jquery.mask.js"></script>

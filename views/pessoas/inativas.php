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
                        <?php if (!is_null($inativas)): ?>
                            <?php foreach ($inativas as $inativa) : ?>
                                <tr>
                                    <td style="text-align: center"><?= $inativa['id_pessoa'] ?></td>
                                    <td style="text-align: center"><?= $inativa['nome_pessoa'] ?></td>
                                    <td style="text-align: center"><?= $inativa['email'] ?></td>
                                    <td style="text-align: center"><?= $inativa['nome_perfil'] ?></td>                            
                                    <?php $data = $inativa['pessoa_criado_em'] ?>
                                    <td style="text-align: center"><?= date('d/m/Y', strtotime($data)) ?></td>
                                    <td style="text-align: center">
                                        <button id="reativar" value="<?= $inativa['id_pessoa'] ?>" class="reativar btn btn-success btn-xs">Reativar</button>                                                                            
                                    </td>                            
                                </tr>                    
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="modal-reativar" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog">                
        <div class="modal-content" style="border-radius: 10px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reativar Pessoa</h4>
            </div>
            <form id="form">
                <div class="modal-body" id="body-modal-reativar">       
                </div>                        
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancelar</button>
                <button id="btn-reativar-pessoa" class="btn btn-success btn-xs">Reativar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/pessoas/pessoas.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/jquery.mask.js"></script>

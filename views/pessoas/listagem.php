<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Pessoas Ativas</h2>        
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
                            <th style="text-align: center">Perfil</th>                        
                            <th style="text-align: center">Criado Em</th>
                            <th style="text-align: center">Ações</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pessoas as $pessoa) : ?>
                            <tr>
                                <td><?= $pessoa['id_pessoa'] ?></td>
                                <td><?= $pessoa['nome_pessoa'] ?></td>
                                <td><?= $pessoa['email'] ?></td>
                                <td><?= $pessoa['nome_perfil'] ?></td>                            
                                <?php $data = $pessoa['pessoa_criado_em'] ?>
                                <td><?= date('d/m/Y', strtotime($data)) ?></td>
                                <td>
                                    <a href="<?php echo URL; ?>/pessoas/pessoa/<?= $pessoa['id_pessoa'] ?>" class="btn btn-info btn-xs">Visualizar</a>                                                                        
                                </td>                            
                            </tr>                    
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/pessoas/pessoas.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/jquery.mask.js"></script>

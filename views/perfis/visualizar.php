<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Perfis do Sistema</h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">            
            <table id="datatable-buttons" class="table table-striped table-bordered" style="text-align: center">
                <thead>
                    <tr>
                        <th style="text-align: center">ID</th>
                        <th style="text-align: center">Nome Perfil</th>
                        <th style="text-align: center">Criado Por</th>
                        <th style="text-align: center">Criado Em</th>
                        <th style="text-align: center">Ações</th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($perfis as $perfil) : ?>
                        <tr>
                            <td><?= $perfil['id_perfil'] ?></td>
                            <td><?= $perfil['nome_perfil'] ?></td>
                            <td><?= $perfil['criado_por'] ?></td>
                            <?php $data = $perfil['criado_em'] ?>
                            <td><?= date('d-m-Y - h-s', strtotime($data)) ?></td>
                            <td>
                                <button class="btn btn-info btn-xs">Editar</button>
                                <button class="btn btn-danger btn-xs">Excluir</button>

                            </td>                            
                        </tr>                    
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/custom.js"></script>
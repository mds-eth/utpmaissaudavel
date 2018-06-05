<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Perfis Cadastrados no Sistema</h2>            
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered" style="text-align: center">
                    <thead>
                        <tr>
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">Nome Perfil</th>
                            <th style="text-align: center">Criado Por</th>
                            <th style="text-align: center">Criado Em</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($perfis as $perfil) : ?>
                            <tr>
                                <td><?= $perfil['id_perfil'] ?></td>
                                <td><?= $perfil['nome_perfil'] ?></td>
                                <td><?= $perfil['perfil_criado_por'] ?></td>
                                <?php $data = $perfil['perfil_criado_em'] ?>
                                <td><?= date('d/m/Y', strtotime($data)) ?></td>                                
                            </tr>                    
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="page-title">
    <div class="title_left">
        <h3>Urls do Sistema</h3>
    </div>        
</div>
<div class="clearfix"></div>
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>URL's</h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">            
            <table id="datatable-buttons" class="table table-striped table-bordered" style="text-align: center">
                <thead>
                    <tr>
                        <th style="text-align: center">URL</th>
                        <th style="text-align: center">Perfil Associado</th>                        
                        <th style="text-align: center">Criado Em</th>
                        <th style="text-align: center">Ações</th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($urls as $url) : ?>
                        <tr>
                            <td><?= $url['nome_url'] ?></td>
                            <td><?= $url['nome_perfil'] ?></td>                            
                            <?php $data = $url['criado_em'] ?>
                            <td><?= date('d/m/Y', strtotime($data)) ?></td>
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

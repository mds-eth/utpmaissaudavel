<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Logs Internos </h2>            
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered" style="text-align: center">
                    <thead>
                        <tr>
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">Classe</th>
                            <th style="text-align: center">Método</th>
                            <th style="text-align: center">Exceção</th>
                            <th style="text-align: center">ID usuário</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($logs as $log) : ?>
                            <tr>
                                <td><?= $log['id_log_error'] ?></td>                                
                                <td><?= $log['nome_classe'] ?></td>
                                <td><?= $log['nome_metodo'] ?></td>
                                <td><?= $log['exception'] ?></td>
                                <td><?= $log['id_usuario'] ?></td>                                  
                            </tr>                    
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Especialidades Cadastrados no Sistema</h2>            
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered" style="text-align: center">
                    <thead>
                        <tr>
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">Especialidade</th>
                            <th style="text-align: center">Descrição</th>
                            <th style="text-align: center">Criado Por</th>
                            <th style="text-align: center">Criado Em</th>
                            <th style="text-align: center">Ações</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($especialidades as $especialidade) : ?>
                            <tr>
                                <td><?= $especialidade['id_especialidade'] ?></td>
                                <td><?= $especialidade['especialidade'] ?></td>
                                <td><?= $especialidade['descricao'] ?></td>
                                <td><?= $especialidade['especialidade_criado_por'] ?></td>
                                <?php $data = $especialidade['especialidade_criado_em'] ?>
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
</div>

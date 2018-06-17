<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Especialidades</h2>            
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
                            <th style="text-align: center">Cor</th>                            
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
                                <td><input type="color" disabled="true" value="<?= $especialidade['cor'] ?>" /></td>                                
                                <?php $data = $especialidade['especialidade_criado_em'] ?>
                                <td><?= date('d/m/Y', strtotime($data)) ?></td>
                                <td>
                                    <a href="<?php echo URL; ?>/especialidades/especialidade/<?= $especialidade['id_especialidade'] ?>" class="btn btn-info btn-xs">Editar</a>                                                                                                            
                                </td>                            
                            </tr>                    
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/especialidades/especialidades.js"></script>

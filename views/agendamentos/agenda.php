<div class="clearfix"></div>
<div class="form-horizontal">
    <div class="col-md-12 col-sm-12 col-xs-12">        
        <div class="x_panel">
            <div class="x_title">   
                <h4>Agenda semanal por Especialidade</h4>
                <div class="clearfix"></div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center">Segunda</th>
                        <th style="text-align: center">Terça</th>
                        <th style="text-align: center">Quarta</th>
                        <th style="text-align: center">Quinta</th>
                        <th style="text-align: center">Sexta</th>
                    </tr>
                </thead>
                <tbody id="tabela">
                    <?php foreach ($especialidades as $especialidade) : ?>
                        <tr>
                            <td><input type="checkbox" class="segunda" value="<?= $especialidade['id_especialidade'] ?>"> <?= $especialidade['especialidade'] ?></td>
                            <td><input type="checkbox" class="terca" value="<?= $especialidade['id_especialidade'] ?>"> <?= $especialidade['especialidade'] ?></td>
                            <td><input type="checkbox" class="quarta" value="<?= $especialidade['id_especialidade'] ?>"> <?= $especialidade['especialidade'] ?></td>
                            <td><input type="checkbox" class="quinta" value="<?= $especialidade['id_especialidade'] ?>"> <?= $especialidade['especialidade'] ?></td>
                            <td><input type="checkbox" class="sexta" value="<?= $especialidade['id_especialidade'] ?>"> <?= $especialidade['especialidade'] ?></td>
                        </tr>
                    <?php endforeach; ?>                        
                </tbody>
            </table>
            <div class="form-group">
                <div class="col-md-8">
                    <button id="gravar" class="btn btn-success btn-xs">Gravar</button>
                    <button id="limpar" class="btn btn-primary btn-xs" type="reset">Limpar</button>
                    <a href="<?php echo URL ?>/home"><button class="btn btn-danger btn-xs" type="button">Cancelar</button></a>
                </div>
            </div>             
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/agendas/agendas.js"></script>


<h4>Calendário Especialidades</h4>
<div class="clearfix"></div>
<div class="form-horizontal">
    <div class="col-md-12 col-sm-12 col-xs-12">        
        <div class="x_panel">
            <div class="x_title">  
                <div class="clearfix"></div>
                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="dataInicial">Data Ínicio</label>
                    <div class="col-md-2">
                        <input id="dataInicial" name="dataInicial" class="form-control" />
                    </div>   
                    <label class="col-md-1 col-sm-3 col-xs-12" for="dataFinal">Data fim</label>
                    <div class="col-md-2">
                        <input id="dataFinal" name="dataFinal" class="form-control" />
                    </div> 
                </div>
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
                <tbody>
                    <?php foreach ($especialidades as $especialidade) : ?>
                        <tr>
                            <td><input class="segunda" type="checkbox" value="<?= $especialidade['id_especialidade'] ?>"> <?= $especialidade['especialidade'] ?></td>
                            <td><input class="terca" type="checkbox" value="<?= $especialidade['id_especialidade'] ?>"> <?= $especialidade['especialidade'] ?></td>
                            <td><input class="quarta" type="checkbox" value="<?= $especialidade['id_especialidade'] ?>"> <?= $especialidade['especialidade'] ?></td>
                            <td><input class="quinta" type="checkbox" value="<?= $especialidade['id_especialidade'] ?>"> <?= $especialidade['especialidade'] ?></td>
                            <td><input class="sexta" type="checkbox" value="<?= $especialidade['id_especialidade'] ?>"> <?= $especialidade['especialidade'] ?></td>
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


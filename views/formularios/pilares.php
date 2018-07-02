<div data-parsley-validate class="form-horizontal form-label-left">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Cadastro de Pilares</h2>
                <div class="clearfix"></div>
            </div>
            <div class="item form-group">
                <label class="col-md-2 col-sm-3 col-xs-12" for="especialidade">Selecione o tipo</label>
                <div class="col-md-2">                    
                    <select class="form-control" id="especialidade" name="especialidade">
                        <option >Selecione</option>
                        <?php foreach ($especialidades as $especialidade) : ?>
                            <option value="<?= $especialidade['id_especialidade'] ?>"><?= $especialidade['especialidade'] ?></option>
                        <?php endforeach; ?>
                    </select>                    
                </div>
            </div>
            <div class="form-group">
                <div style="float: right;">
                    <button id="gravar" class="btn btn-success btn-xs">Gravar</button>
                    <button class="btn btn-primary btn-xs" type="reset">Limpar</button>
                    <a href="<?php echo URL ?>/home">
                        <button class="btn btn-danger btn-xs" type="button">Cancelar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/formularios/formularios.js"></script>

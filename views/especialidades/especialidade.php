<div data-parsley-validate class="form-horizontal form-label-left">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Especialidade</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="especialidade">Nome
                    </label>
                    <div class="col-md-4">           
                        <input type="hidden" id="id" name="id" value="<?= $especialidade->id_especialidade ?>">
                        <input type="text" id="especialidade" name="especialidade" value="<?= $especialidade->especialidade ?>" readonly="true" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="cor">Cor para Agenda
                    </label>
                    <div class="col-md-4">
                        <input type="color" id="cor" name="cor" value="<?= $especialidade->cor ?>" readonly="true" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="descricao">Descrição
                    </label>
                    <div class="col-md-4">
                        <textarea cols="10" rows="10" id="descricao" readonly="true" style="resize: none" name="descricao" required="required" class="form-control col-md-7 col-xs-12"><?= $especialidade->descricao ?></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div style="float: right;">
                    <span id="botaoOculto"></span>
                    <button id="editar" class="btn btn-info btn-xs">Editar</button>                    
                    <a href="<?php echo URL ?>/especialidades/visualizar">
                        <button class="btn btn-danger btn-xs" type="button">Cancelar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/especialidades/especialidades.js"></script>

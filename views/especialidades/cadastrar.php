<div data-parsley-validate class="form-horizontal form-label-left">
    <div class="col-md-12 col-sm-12 col-xs-12">        
        <div class="x_panel">
            <div class="x_title">
                <h2>Cadastro de Especialidades</h2>                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />                
                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="especialidade">Nome
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="especialidade" name="especialidade" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="descricao">Descrição
                    </label>
                    <div class="col-md-4">
                        <textarea cols="10" rows="10" id="descricao" style="resize: none" name="descricao" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                    </div>
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
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/especialidades/especialidades.js"></script>


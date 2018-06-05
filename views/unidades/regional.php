<div class="clearfix"></div>
<div class="form-horizontal">
    <div class="col-md-12 col-sm-12 col-xs-12">        
        <div class="x_panel">
            <div class="x_title">   
                <h4>Cadastrar Regional</h4>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />                
                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="regional">Regional</label>
                    <div class="col-md-6">
                        <input type="text" id="regional" name="regional" required="true" class="form-control col-md-7 col-xs-12">
                    </div>                
                </div> 
                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="responsavel">Responsável</label>
                    <div class="col-md-6">
                        <input type="text" id="responsavel" name="responsavel" required="true" class="form-control col-md-7 col-xs-12">
                    </div>                
                </div>   
                <div class="form-group">
                    <div style="float: right;">
                        <button id="gravarRegional" class="btn btn-success btn-xs">Gravar</button>
                        <button id="limpar" class="btn btn-primary btn-xs" type="reset">Limpar</button>
                        <a href="<?php echo URL ?>/home">
                            <button class="btn btn-danger btn-xs" type="button">Cancelar</button>
                        </a>                                               
                    </div>
                </div>            
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/unidades/unidades.js"></script>


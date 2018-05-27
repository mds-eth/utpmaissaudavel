<div class="page-title">
    <div class="title_left">
        <h3>Cadastro de URL's</h3>
    </div>        
</div>
<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">        
    <div class="x_panel">
        <div class="x_title">
            <h2>URL</h2>                
            <div class="clearfix"></div>
        </div>        
        <div class="x_content">
            <br />                            
            <div class="item form-group">
                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="url">URL<span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="url" name="url" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="url">Perfil<span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <?php foreach ($perfil as $perfis): ?>
                            <input id="perfil" name="perfil" value="<?= $perfis['id_perfil'] ?>" type="checkbox"><?= $perfis['nome_perfil'] ?><br>    
                        <?php endforeach; ?>
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
</div>   
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/urls/urls.js"></script>


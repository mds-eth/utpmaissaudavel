<div class="page-title">
    <div class="title_left">
        <h3>Cadastro de Perfis</h3>
    </div>        
</div>
<form id="formPerfil" class="form-horizontal">
    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Perfil</h2>                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />                
                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="perfil">Nome <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="perfil" name="perfil" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" style="float: right;">
                        <a href="<?php echo BASE_URL ?>home"><button class="btn btn-danger" type="button">Cancelar</button></a>
                        <button class="btn btn-primary" type="reset">Limpar</button>
                        <button type="submit" class="btn btn-success">Gravar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</form>

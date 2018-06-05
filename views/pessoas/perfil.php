<div class="page-title">
    <div class="title_left">
        <h3>Meu Perfil</h3>
    </div>
</div>
<div class="clearfix"></div>    
<div class="form-horizontal">   
    <div class="row">    
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Dados Pessoais</h2>                
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="nome">Nome</label>
                        <div class="col-md-8">
                            <input value="<?= $perfil->nome_pessoa ?>" readonly="true" class="form-control col-md-7 col-xs-12">
                        </div>                    
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="data_nascimento">Data de nascimento
                        </label>
                        <div class="col-md-8">
                            <input value="<?= $perfil->data_nascimento ?>" readonly="true" class='date form-control col-md-7 col-xs-12'>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="mae">Nome Mãe
                        </label>
                        <div class="col-md-8">
                            <input type="text" id="mae" name="mae" required="required" class="form-control col-md-7 col-xs-12">
                        </div>                    
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">Sexo
                        </label>
                        <div class="col-md-8">
                            <input value="<?= $perfil->sexo ?>" readonly="true" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="cpf">CPF</label>
                        <div class="col-md-8">
                            <input value="<?= $perfil->cpf ?>" class="form-control" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="rg">RG</label>
                        <div class="col-md-8">
                            <input value="<?= $perfil->rg ?>" class="form-control" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="email">Email</label>
                        <div class="col-md-8">
                            <input value="<?= $perfil->email ?>" class="form-control col-md-7 col-xs-12" readonly="true">
                        </div>
                    </div>                                                    
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Endereço</h2>                
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="cep">CEP</label>                        
                        <div class="col-md-8">
                            <input value="<?= $perfil->cep ?>" class="form-control col-md-7 col-xs-12" readonly="true">
                        </div>
                    </div>               
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="rua">Rua</label>
                        <div class="col-md-8">
                            <input value="<?= $perfil->rua ?>" class="form-control col-md-7 col-xs-12" readonly="true">
                        </div>
                    </div>                
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="bairro">Bairro</label>
                        <div class="col-md-8">
                            <input value="<?= $perfil->bairro ?>" class="form-control col-md-7 col-xs-12" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="cidade">Cidade</label>
                        <div class="col-md-8">
                            <input value="<?= $perfil->cidade ?>" class="form-control" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="estado">Estado</label>
                        <div class="col-md-8">
                            <input value="<?= $perfil->estado ?>" id="estado" name="estado" class="form-control" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="numero">Número</label>
                        <div class="col-md-8">
                            <input value="<?= $perfil->numero ?>" id="numero" name="numero" class="form-control" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="complemento">Complemento</label>
                        <div class="col-md-8">
                            <input value="<?= $perfil->complemento ?>" id="complemento" name="complemento" class="form-control" readonly="true">
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Contato</h2>                
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12" for="residencial">Telefone Residencial</label>
                        <div class="col-md-5">
                            <input value="<?= $perfil->telefone ?>" id="residencial" name="residencial" type="text" class="form-control" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12" for="celular">Telefone Celular</label>
                        <div class="col-md-5">
                            <input value="<?= $perfil->celular ?>" id="celular" name="celular" type="text" class="form-control" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12" for="contato">Telefone Para Contato</label>
                        <div class="col-md-5">
                            <input value="<?= $perfil->contato ?>" id="contato" name="contato" type="text" class="form-control" readonly="true">
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Perfil Vinculado</h2>                
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">               
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12" for="perfil">Perfil</label>
                        <div class="col-md-5">
                            <input value="<?= $perfil->nome_perfil ?>" id="perfil" name="perfil" type="text" class="form-control" readonly="true">
                        </div>
                    </div> 
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12" for="data-criacao">Data cadastro</label>
                        <div class="col-md-5">
                            <?php $data = $perfil->pessoa_criado_em ?>
                            <input value="<?= date('d/m/Y', strtotime($data)) ?>" id="data-criacao" name="data-criacao" type="text" class="form-control" readonly="true">
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>


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
                            <span><?= $perfil->nome_pessoa ?></span>                            
                        </div>                    
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="data_nascimento">Data de nascimento
                        </label>
                        <div class="col-md-8">
                            <span><?= $perfil->data_nascimento ?></span>                                                        
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="mae">Nome Responsável
                        </label>
                        <div class="col-md-8">
                            <span><?= $perfil->data_nascimento ?></span>                                                                                    
                        </div>                    
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">Sexo
                        </label>
                        <div class="col-md-8">
                            <span><?= $perfil->sexo ?></span>                                                                                    
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="cpf">CPF</label>
                        <div class="col-md-8">
                            <span><?= $perfil->cpf ?></span>                             
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="rg">RG</label>
                        <div class="col-md-8">
                            <span><?= $perfil->rg ?></span>                                
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="email">Email</label>
                        <div class="col-md-8">
                            <span><?= $perfil->email ?></span>                                
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
                            <span><?= $perfil->cep ?></span>                                
                        </div>
                    </div>               
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="rua">Rua</label>
                        <div class="col-md-8">
                            <span><?= $perfil->rua ?></span>                                   
                        </div>
                    </div>                
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="bairro">Bairro</label>
                        <div class="col-md-8">
                            <span><?= $perfil->bairro ?></span>                                
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="cidade">Cidade</label>
                        <div class="col-md-8">
                            <span><?= $perfil->cidade ?></span>                               
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="estado">Estado</label>
                        <div class="col-md-8">
                            <span><?= $perfil->estado ?></span>                                  
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="numero">Número</label>
                        <div class="col-md-8">
                            <span><?= $perfil->numero ?></span>                                  
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="complemento">Complemento</label>
                        <div class="col-md-8">
                            <span><?= $perfil->complemento ?></span>                                  
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
                            <span><?= $perfil->telefone ?></span>                               
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12" for="celular">Telefone Celular</label>
                        <div class="col-md-5">
                            <span><?= $perfil->celular ?></span>                               
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12" for="contato">Telefone Para Contato</label>
                        <div class="col-md-5">
                            <span><?= $perfil->contato ?></span>                               
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
                            <span><?= $perfil->nome_perfil ?></span>                               
                        </div>
                    </div> 
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12" for="data-criacao">Data cadastro</label>
                        <div class="col-md-5">
                            <?php $data = $perfil->pessoa_criado_em ?>
                            <span><?= date('d/m/Y', strtotime($data)) ?></span>                               
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>


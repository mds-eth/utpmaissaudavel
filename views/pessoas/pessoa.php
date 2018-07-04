<div class="clearfix"></div>    
<div class="form-horizontal">   
    <div class="row">    
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel" style="padding-bottom: 52px;">
                <div class="x_title">
                    <h2>Dados Pessoais</h2>                
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="nome">Nome</label>
                        <div class="col-md-8">
                            <input type="hidden" value="<?= $pessoa->id_pessoa ?>" id="idPessoa" name="idPessoa" />
                            <input value="<?= $pessoa->nome_pessoa ?>" type="text" id="nome" name="nome" required="required" class="form-control col-md-7 col-xs-12" readonly="true">
                        </div>                    
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="data_nascimento">Data de nascimento</label>
                        <div class="col-md-8">
                            <input value="<?= $pessoa->data_nascimento ?>" type="text" class='form-control' id="data_nascimento" name="data_nascimento" required='required' data-inputmask="'mask' : '99/99/9999'" readonly="true">
                        </div>
                    </div>                    
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">Sexo
                        </label>
                        <div class="col-md-8">
                            <input value="<?= $pessoa->sexo ?>" disabled="true" class="form-control" />
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="cpf">CPF</label>
                        <div class="col-md-8">
                            <input value="<?= $pessoa->cpf ?>" type="text" id="cpf" name="cpf" class="form-control" required="required" data-inputmask="'mask' : '999.999.999-99'" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="rg">RG</label>
                        <div class="col-md-8">
                            <input value="<?= $pessoa->rg ?>" type="text" id="rg" name="rg" class="form-control" required="required" data-inputmask="'mask' : '99.999.999-9'" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="email">Email</label>
                        <div class="col-md-8">
                            <input value="<?= $pessoa->email ?>" type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" readonly="true">
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
                            <input value="<?= $pessoa->cep ?>" type="text" id="cep" name="cep" class="form-control col-md-7 col-xs-12" required="required" data-inputmask="'mask' : '99999-999'" readonly="true">
                        </div>
                    </div>               
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="rua">Rua</label>
                        <div class="col-md-8">
                            <input value="<?= $pessoa->rua ?>" type="text" id="rua" name="rua" required="required" required="required" class="form-control col-md-7 col-xs-12" readonly="true">
                        </div>
                    </div>                
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="bairro">Bairro</label>
                        <div class="col-md-8">
                            <input value="<?= $pessoa->bairro ?>" type="text" id="bairro" name="bairro" required="required" class="form-control col-md-7 col-xs-12" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="cidade">Cidade</label>
                        <div class="col-md-8">
                            <input value="<?= $pessoa->cidade ?>" type="text" id="cidade" name="cidade" required="required" class="form-control" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="estado">Estado</label>
                        <div class="col-md-8">
                            <input value="<?= $pessoa->estado ?>" type="text" id="estado" name="estado" class="form-control" required="required" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="numero">Número</label>
                        <div class="col-md-8">
                            <input value="<?= $pessoa->numero ?>" type="text" id="numero" name="numero" class="form-control" required="required" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="complemento">Complemento</label>
                        <div class="col-md-8">
                            <input value="<?= $pessoa->complemento ?>" type="text" id="complemento" name="complemento" class="form-control" required="required" readonly="true">
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
                            <input value="<?= $pessoa->telefone ?>" id="residencial" name="residencial" type="text" class="form-control" required="required" data-inputmask="'mask' : '(99) 9999-9999'" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12" for="celular">Telefone Celular</label>
                        <div class="col-md-5">
                            <input value="<?= $pessoa->celular ?>" id="celular" name="celular" type="text" class="form-control" required="required" data-inputmask="'mask' : '(99) 99999-9999'" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12" for="contato">Telefone Para Contato</label>
                        <div class="col-md-5">
                            <input value="<?= $pessoa->contato ?>" id="contato" name="contato" type="text" class="form-control" required="required" data-inputmask="'mask' : '(99) 99999-9999'" readonly="true">
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div style="padding-bottom: 51px;" class="x_panel">
                <div class="x_title">
                    <h2>Perfil</h2>                
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">               
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12" for="especialidade">Perfil</label>
                        <div class="col-md-7">
                            <input value="<?= $pessoa->nome_perfil ?>" class="form-control"  disabled="true" />
                        </div>
                    </div>  
                    <?php if ($pessoa->id_perfil == Perfis::FISIOTERAPEUTA || $pessoa->id_perfil == Perfis::ALUNO) : ?>
                        <div class="item form-group">
                            <label class="col-md-4 col-sm-3 col-xs-12" for="data-criacao"><?= $pessoa->id_perfil == 3 ? 'CREFFITO' : 'RA' ?></label>
                            <div class="col-md-7">                                
                                <input value="<?= $pessoa->codigo ?>" class="form-control"  disabled="true" />
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12" for="data-criacao">Data cadastro</label>
                        <div class="col-md-5">
                            <?php $data = $pessoa->pessoa_criado_em ?>
                            <span><?= date('d/m/Y', strtotime($data)) ?></span>                               
                        </div>
                    </div> 
                    <div class="form-group">
                        <span id="btn-editar-pessoa"></span>     
                        <button id="editarPessoa" class="btn btn-primary btn-xs">Editar</button>                            
                        <button id="inativar" value="<?= $pessoa->id_pessoa ?>" class="inativar btn btn-warning btn-xs">Inativar</button>                            
                        <a href="<?php echo URL ?>/home"><button class="btn btn-danger btn-xs" type="button">Cancelar</button></a>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-inativar-pessoa" class="modal fade" role="dialog">
    <div class="modal-dialog">                
        <div class="modal-content" style="border-radius: 10px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Inativar Pessoa</h4>
            </div>
            <form id="formDel">
                <div class="modal-body" id="pessoa"></div>                        
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancelar</button>
                <button id="btn-modal-inativar" class="btn btn-success btn-xs">Inativar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/pessoas/pessoas.js"></script>                


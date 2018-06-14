<div class="clearfix"></div>  
<div data-parsley-validate class="form-horizontal form-label-left">     
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
                            <input value="<?= $ficha->nome_pessoa ?>" type="text" id="nome" name="nome" required="required" class="form-control col-md-7 col-xs-12" readonly="true">
                        </div>                    
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="data_nascimento">Data de nascimento</label>
                        <div class="col-md-8">
                            <input value="<?= $ficha->data_nascimento ?>" class='date form-control' type="text" id="data_nascimento" name="data_nascimento" required='required' data-inputmask="'mask' : '99/99/9999'" readonly="true">
                        </div>
                    </div>
                    <?php if (!is_null($ficha->responsavel)) : ?>
                        <div class="item form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12" for="responsavel">Responsavel</label>
                            <div class="col-md-8">
                                <input value="<?= $ficha->responsavel ?>" type="text" id="nome" name="nome" required="required" class="form-control col-md-7 col-xs-12" readonly="true">
                            </div>                    
                        </div>
                    <?php endif; ?>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">Sexo</label>
                        <div class="col-md-8">
                            <input value="<?= $ficha->sexo ?>" class="form-control" readonly="true"/>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="cpf">CPF</label>
                        <div class="col-md-8">
                            <input value="<?= $ficha->cpf ?>" type="text" class="form-control" required="required" data-inputmask="'mask' : '999.999.999-99'" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="rg">RG</label>
                        <div class="col-md-8">
                            <input value="<?= $ficha->rg ?>" type="text" id="rg" name="rg" class="form-control" required="required" data-inputmask="'mask' : '99.999.999-9'" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="email">Email</label>
                        </label>
                        <div class="col-md-8">
                            <input value="<?= $ficha->email ?>" type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" readonly="true">
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
                        </label>
                        <div class="col-md-8">
                            <input value="<?= $ficha->cep ?>" type="text" id="cep" name="cep" class="form-control" required="required" data-inputmask="'mask' : '99999-999'" readonly="true">
                        </div>
                    </div>               
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="rua">Rua</label>
                        <div class="col-md-8">
                            <input value="<?= $ficha->rua ?>" type="text" id="rua" name="rua" required="required" required="required" class="form-control col-md-7 col-xs-12" readonly="true">
                        </div>
                    </div>                
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="bairro">Bairro</label>
                        <div class="col-md-8">
                            <input value="<?= $ficha->bairro ?>" type="text" id="bairro" name="bairro" required="required" class="form-control col-md-7 col-xs-12" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="cidade">Cidade</label>
                        <div class="col-md-8">
                            <input value="<?= $ficha->cidade ?>" type="text" id="cidade" name="cidade" required="required" class="form-control" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="estado">Estado</label>
                        <div class="col-md-8">
                            <input value="<?= $ficha->estado ?>" type="text" id="estado" name="estado" class="form-control" required="required" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="numero">Número</label>
                        <div class="col-md-8">
                            <input value="<?= $ficha->numero ?>" type="text" id="numero" name="numero" class="form-control" required="required" readonly="true">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="complemento">Complemento</label>
                        <div class="col-md-8">
                            <input value="<?= $ficha->complemento ?>" type="text" id="complemento" name="complemento" class="form-control" required="required" readonly="true">
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
                    <div class="x_content">
                        <div class="item form-group">
                            <label class="col-md-4 col-sm-3 col-xs-12" for="residencial">Telefone Residencial</label>
                            <div class="col-md-5">
                                <input value="<?= $ficha->telefone ?>" id="residencial" name="residencial" type="text" class="form-control" required="required" data-inputmask="'mask' : '(99) 9999-9999'" readonly="true">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-md-4 col-sm-3 col-xs-12" for="celular">Telefone Celular</label>
                            <div class="col-md-5">
                                <input value="<?= $ficha->celular ?>" id="celular" name="celular" type="text" class="form-control" required="required" data-inputmask="'mask' : '(99) 99999-9999'" readonly="true">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-md-4 col-sm-3 col-xs-12" for="contato">Telefone Para Contato</label>
                            <div class="col-md-5">
                                <input value="<?= $ficha->contato ?>" id="contato" name="contato" type="text" class="form-control" required="required" data-inputmask="'mask' : '(99) 99999-9999'" readonly="true">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Unidade de Saúde, Especialidade e Convênio</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div class="x_content">                        
                        <div class="item form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12" for="unidade">Unidade
                            </label>
                            <div class="col-md-8">                                
                                <input class="form-control" value="<?= $ficha->nome_unidade ?>" readonly="true" />
                            </div>
                        </div>  
                        <div class="item form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12" for="especialidade">Especialidade
                            </label>
                            <div class="col-md-8">
                                <?php $nomes = null; ?>
                                <?php foreach ($especialidades as $especialidade) : ?>
                                    <?php $nomes .= $especialidade['especialidade'] . ' ,' ?>
                                <?php endforeach; ?>
                                <input class="form-control" value="<?= $nomes ?>" readonly="true" />
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12" for="convenio">Convênio
                            </label>
                            <div class="col-md-8">
                                <input class="form-control" value="<?= $ficha->convenio ?>" readonly="true" />
                            </div>
                        </div>                                             
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/pacientes/pacientes.js"></script>        

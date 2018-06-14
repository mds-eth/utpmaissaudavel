<div class="page-title">
    <div class="title_left">
        <h3>Cadastro de Pacientes</h3>
    </div>
</div>
<div class="clearfix"></div>  
<div data-parsley-validate class="form-horizontal form-label-left">     
    <div class="row">    
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel" style="padding-bottom: 40px;">
                <div class="x_title">
                    <h2>Dados Pessoais</h2> 
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="nome">Nome</label>
                        <div class="col-md-8">
                            <input type="text" id="nome" name="nome" required="required" class="form-control col-md-7 col-xs-12">
                        </div>                    
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="data_nascimento">Data de nascimento</label>
                        <div class="col-md-8">
                            <input class='date form-control' type="text" id="data_nascimento" name="data_nascimento" required='required' data-inputmask="'mask' : '99/99/9999'">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="responsavel"><span id="labelResponsavel"></span></label>
                        <div class="col-md-8">
                            <div id="inputResponsavel"></div>
                        </div>                    
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">Sexo</label>
                        <div class="col-md-8">
                            <select class="form-control" id="sexo" name="sexo">
                                <option>Selecione</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="cpf">CPF</label>
                        <div class="col-md-8">
                            <input type="text" id="cpf" name="cpf" class="form-control" required="required" data-inputmask="'mask' : '999.999.999-99'">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="rg">RG</label>
                        <div class="col-md-8">
                            <input type="text" id="rg" name="rg" class="form-control" required="required" data-inputmask="'mask' : '99.999.999-9'">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="email">Email</label>
                        </label>
                        <div class="col-md-8">
                            <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
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
                            <input type="text" id="cep" name="cep" class="form-control" required="required" data-inputmask="'mask' : '99999-999'">
                        </div>
                    </div>               
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="rua">Rua</label>
                        <div class="col-md-8">
                            <input type="text" id="rua" name="rua" required="required" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>                
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="bairro">Bairro</label>
                        <div class="col-md-8">
                            <input type="text" id="bairro" name="bairro" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="cidade">Cidade</label>
                        <div class="col-md-8">
                            <input type="text" id="cidade" name="cidade" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="estado">Estado</label>
                        <div class="col-md-8">
                            <input type="text" id="estado" name="estado" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="numero">Número</label>
                        <div class="col-md-8">
                            <input type="text" id="numero" name="numero" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="complemento">Complemento</label>
                        <div class="col-md-8">
                            <input type="text" id="complemento" name="complemento" class="form-control" required="required">
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
                                <input id="residencial" name="residencial" type="text" class="form-control" required="required" data-inputmask="'mask' : '(99) 9999-9999'">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-md-4 col-sm-3 col-xs-12" for="celular">Telefone Celular</label>
                            <div class="col-md-5">
                                <input id="celular" name="celular" type="text" class="form-control" required="required" data-inputmask="'mask' : '(99) 99999-9999'">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-md-4 col-sm-3 col-xs-12" for="contato">Telefone Para Contato</label>
                            <div class="col-md-5">
                                <input id="contato" name="contato" type="text" class="form-control" required="required" data-inputmask="'mask' : '(99) 99999-9999'">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Especialidade, Unidade de Saúde e Convênio</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div class="x_content">
                        <div class="item form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12" for="especialidade">Especialidade
                            </label>
                            <div class="col-md-8">
                                <?php foreach ($especialidades as $especialidade) : ?>                                   
                                    <input id="especialidade" name="especialidade" type="checkbox" value="<?= $especialidade['id_especialidade'] ?>" class="especialidade"><?= $especialidade['especialidade'] ?><br>                                    
                                <?php endforeach; ?>

                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12" for="unidade">Unidade
                            </label>
                            <div class="col-md-8">                                
                                <select class="form-control" id="unidade" name="unidade">
                                    <option >Selecione</option>
                                    <?php foreach ($unidades as $unidade) : ?>
                                        <option value="<?= $unidade['id_unidade_de_saude'] ?>"><?= $unidade['nome_unidade'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>  

                        <div class="item form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12" for="convenio">Convênio
                            </label>
                            <div class="col-md-8">
                                <select class="form-control" id="convenio" name="convenio">
                                    <option>Selecione</option>
                                    <option value="Particular">Particular</option>
                                    <option value="SUS">SUS</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-10">         
                            <div class="form-group">
                                <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button id="gravar" class="btn btn-success btn-xs">Gravar</button>
                                    <button id="limpar" class="btn btn-primary btn-xs" type="reset">Limpar</button>
                                    <a href="<?php echo URL ?>/home"><button class="btn btn-danger btn-xs" type="button">Cancelar</button></a>
                                </div>
                            </div>
                        </div>                        
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/pacientes/pacientes.js"></script>        

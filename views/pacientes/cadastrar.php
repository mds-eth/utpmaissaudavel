<div class="page-title">
    <div class="title_left">
        <h3>Cadastro de Pacientes</h3>
    </div>
</div>
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
                        <label class="col-md-3 col-sm-3 col-xs-12" for="nome">Nome
                        </label>
                        <div class="col-md-8">
                            <input type="text" id="nome" name="nome" required="required" class="form-control col-md-7 col-xs-12">
                        </div>                    
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="data_nascimento">Dt nascimento
                        </label>
                        <div class="col-md-8">
                            <input class='date form-control' type="date" id="data_nascimento" name="data_nascimento" required='required'>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="responsavel">Nome Responsável</label>
                        <div class="col-md-8">
                            <input type="text" id="responsavel" name="responsavel" required="required" class="form-control col-md-7 col-xs-12">
                        </div>                    
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">Sexo
                        </label>
                        <div class="col-md-8">
                            <select class="form-control" id="sexo" name="sexo">
                                <option>Selecione</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="cpf">CPF<span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" id="cpf" name="cpf" class="form-control" required="required" data-inputmask="'mask' : '999.999.999-99'">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="rg">RG<span class="required">*</span></label>
                        <div class="col-md-8">
                            <input type="text" id="rg" name="rg" class="form-control" required="required" data-inputmask="'mask' : '99.999.999-9'">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
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
                        <label class="col-md-3 col-sm-3 col-xs-12" for="rua">Rua <span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" id="rua" name="rua" required="required" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>                
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="bairro">Bairro <span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" id="bairro" name="bairro" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="cidade">Cidade<span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" id="cidade" name="cidade" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="estado">Estado<span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" id="estado" name="estado" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="numero">Número<span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" id="numero" name="numero" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="complemento">Complemento<span class="required">*</span>
                        </label>
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
                            <label class="col-md-4 col-sm-3 col-xs-12" for="residencial">Telefone Residencial <span class="required">*</span>
                            </label>
                            <div class="col-md-5">
                                <input id="residencial" name="residencial" type="text" class="form-control" required="required" data-inputmask="'mask' : '(99) 9999-9999'">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-md-4 col-sm-3 col-xs-12" for="celular">Telefone Celular <span class="required">*</span>
                            </label>
                            <div class="col-md-5">
                                <input id="celular" name="celular" type="text" class="form-control" required="required" data-inputmask="'mask' : '(99) 99999-9999'">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-md-4 col-sm-3 col-xs-12" for="contato">Telefone Para Contato <span class="required">*</span>
                            </label>
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
                    <h2>Unidade de Saúde, Especialidade e Convênio</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div class="x_content">                        
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
                            <label class="col-md-3 col-sm-3 col-xs-12" for="especialidade">Especialidade
                            </label>
                            <div class="col-md-8">
                                <select class="form-control" id="especialidade" name="especialidade">
                                    <option>Selecione</option>
                                    <?php foreach ($especialidades as $especialidade) : ?>
                                        <option value="<?= $especialidade['id_especialidade'] ?>"><?= $especialidade['id_especialidade'] . ' - ' . $especialidade['especialidade'] ?></option>
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

<div class="page-title">
    <div class="title_left">
        <h3>Cadastrar Usuários</h3>
    </div>
</div>
<form id="formUsuario" data-parsley-validate class="form-horizontal form-label-left">
    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Dados Pessoais</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="nome">Nome <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="nome" name="nome" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="data_nascimento">Data de nascimento<span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="data_nascimento" name="data_nascimento" class="form-control col-md-7 col-xs-12" data-inputmask="'mask': '99/99/9999'">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12">Sexo<span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <p>

                            M:<input type="radio" class="flat" name="sexo" id="sexo" value="M" checked="" required />
                            F: <input type="radio" class="flat" name="sexo" id="sexo" value="F" />
                        </p>
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="cpf">CPF<span class="required">*</span></label>
                    <div class="col-md-2">
                        <input type="text" id="cpf" name="cpf" class="form-control" data-inputmask="'mask' : '999-999-999-99'">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="rg">RG<span class="required">*</span></label>
                    <div class="col-md-2">
                        <input type="text" id="rg" name="rg" class="form-control" data-inputmask="'mask' : '99-999-999-9'">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12">Confirmar Email <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <input type="email" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Contato</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />

                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="residencial">Telefone Residencial <span class="required">*</span>
                    </label>
                    <div class="col-md-2">
                        <input id="residencial" name="residencial" type="text" class="form-control" data-inputmask="'mask' : '(99) 9999-9999'">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="celular">Telefone Celular <span class="required">*</span>
                    </label>
                    <div class="col-md-2">
                        <input id="celular" name="celular" type="text" class="form-control" data-inputmask="'mask' : '(99) 99999-9999'">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="contato">Telefone Para Contato <span class="required">*</span>
                    </label>
                    <div class="col-md-2">
                        <input id="contato" name="contato" type="text" class="form-control" data-inputmask="'mask' : '(99) 99999-9999'">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Endereço</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />

                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="cep">CEP<span class="required">*</span>
                    </label>
                    <div class="col-md-2">
                        <input type="text" id="cep" name="cep" class="form-control" data-inputmask="'mask' : '99999-999'">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="rua">Rua <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="rua" name="rua" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="bairro">Bairro <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="bairro" name="bairro" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="cidade">Cidade<span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="cidade" name="cidade" class="form-control">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="uf">Estado<span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="uf" name="uf" class="form-control">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="numero">Número<span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="numero" name="numero" class="form-control">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="complemento">Complemento<span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="complemento" name="complemento" class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="pais">País<span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="pais" name="pais" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="<?php echo BASE_URL ?>home"><button class="btn btn-danger" type="button">Cancelar</button></a>
                        <button class="btn btn-primary" type="reset">Limpar</button>
                        <button type="submit" class="btn btn-success">Gravar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

var pessoas = {

    init: function () {

        $('#cep').on('blur', pessoas.buscaCep);
        $('#cpf').on('blur', pessoas.validaCpf);
        $('#gravar').on('click', pessoas.gravar);
        $('#btnExcluir').on('click', pessoas.excluirPessoa);
        $('#btnEditar').on('click', pessoas.validaCamposEditar);
    },

    gravar: function () {

        $.ajax({
            type: 'POST',
            url: 'cadastrar',
            data: {
                nome: $('#nome').val(),
                dataNascimento: $('#data_nascimento').val(),
                sexo: $('#sexo').val(),
                cpf: $('#cpf').val(),
                rg: $('#rg').val(),
                email: $('#email').val(),
                residencial: $('#residencial').val(),
                celular: $('#celular').val(),
                contato: $('#contato').val(),
                cep: $('#cep').val(),
                rua: $('#rua').val(),
                bairro: $('#bairro').val(),
                cidade: $('#cidade').val(),
                estado: $('#uf').val(),
                numero: $('#numero').val(),
                complemento: $('#complemento').val(),
                perfil: $('#perfil').val()
            },
            success: function (retorno) {

                if (retorno) {

                    swal({
                        title: "Cadastrado com Sucesso!",
                        icon: "success"
                    });

                    setTimeout(function () {
                        window.location = URL + '/pessoas/visualizar';
                    }, 2000);

                } else {
                    swal({
                        type: 'warning',
                        title: 'Ocorreu algum erro ao realizar o cadastro, revise todos os dados informados',
                        confirmButtonText: 'OK'
                    });
                    return;
                }
            }
        });
    },

    validaCamposEditar: function () {

        if ($('#nome').val() === '') {
            $('#nome').focus();
            $('#nome').css('border', '1px solid red');
            $('#nome').val('Campo nome não pode ficar vazio');
            return;
        }

        if ($('#data_nascimento').val() === '') {
            $('#data_nascimento').focus();
            $('#data_nascimento').css('border', '1px solid red');
            return;
        }

        if ($('#cpf').val() === '') {
            $('#cpf').focus();
            $('#cpf').css('border', '1px solid red');
            return;
        }

        if ($('#rg').val() === '') {
            $('#rg').focus();
            $('#rg').css('border', '1px solid red');
            return;
        }

        if ($('#email').val() === '') {
            $('#email').focus();
            $('#email').css('border', '1px solid red');
            return;
        }

        if ($('#residencial').val() === '') {
            $('#residencial').focus();
            $('#residencial').css('border', '1px solid red');
            return;
        }

        if ($('#celular').val() === '') {
            $('#celular').focus();
            $('#celular').css('border', '1px solid red');
            return;
        }

        if ($('#contato').val() === '') {
            $('#contato').focus();
            $('#contato').css('border', '1px solid red');
            return;
        }

        if ($('#cep').val() === '') {
            $('#cep').focus();
            $('#cep').css('border', '1px solid red');
            return;
        }

        if ($('#rua').val() === '') {
            $('#rua').focus();
            $('#rua').css('border', '1px solid red');
            return;
        }

        if ($('#bairro').val() === '') {
            $('#bairro').focus();
            $('#bairro').css('border', '1px solid red');
            return;
        }

        if ($('#cidade').val() === '') {
            $('#cidade').focus();
            $('#cidade').css('border', '1px solid red');
            return;
        }

        if ($('#estado').val() === '') {
            $('#estado').focus();
            $('#estado').css('border', '1px solid red');
            return;
        }

        if ($('#numero').val() === '') {
            $('#numero').focus();
            $('#numero').css('border', '1px solid red');
            return;
        }

        if ($('#complemento').val() === '') {
            $('#complemento').focus();
            $('#complemento').css('border', '1px solid red');
            return;
        }

        pessoas.editarRegistro();

    },

    editarRegistro: function () {

        $.ajax({
            url: 'editar',
            type: 'POST',
            data: {
                idPessoa: $('#idPessoa').val(),
                nome: $('#nome').val(),
                dataNascimento: $('#data_nascimento').val(),
                cpf: $('#cpf').val(),
                rg: $('#rg').val(),
                email: $('#email').val(),
                residencial: $('#residencial').val(),
                celular: $('#celular').val(),
                contato: $('#contato').val(),
                cep: $('#cep').val(),
                rua: $('#rua').val(),
                bairro: $('#bairro').val(),
                cidade: $('#cidade').val(),
                estado: $('#estado').val(),
                numero: $('#numero').val(),
                complemento: $('#complemento').val()
            },
            success: function (result) {

                if (result) {

                    swal({
                        title: "Atualizado com Sucesso!",
                        icon: "success"
                    });

                    setTimeout(function () {
                        window.location = URL + '/pessoas/visualizar';
                    }, 1000);
                }
            }
        });
    },

    excluirPessoa: function () {

        $.ajax({
            url: 'excluir',
            type: 'POST',
            dataType: 'json',
            data: {idPessoa: $('#idPessoa').val()},
            success: function (result) {

                if (result) {
                    window.location = URL + '/pessoas/visualizar';
                }
            }
        });


    },

    buscaCep: function () {

        var cep = $('#cep').val();

        $.ajax({
            url: 'buscaCep',
            type: 'POST',
            data: {cep: cep},
            dataType: 'json',
            success: function (data) {
                if (parseInt(data.sucesso) === 1) {

                    $('#rua').val(data.rua);
                    $('#bairro').val(data.bairro);
                    $('#cidade').val(data.cidade);
                    $('#uf').val(data.uf);
                    $('#numero').focus();
                }
            }
        });
    },

    validaCpf: function () {

        var cpf = $('#cpf').val();

        $.ajax({
            url: 'validaCpf',
            type: 'POST',
            data: {cpf: cpf},
            dataType: 'json',
            success: function (result) {

                /*if (result === 1) {
                 
                 $('#cpf').focus();
                 $('#cpf').html('Já existe outra pessoa com este mesmo CPF, favor verificar');
                 $('#cpf').css('border', '1px solid red');
                 }*/
            }
        });
    }
};

function editar(id) {

    if (id !== null && id !== 'undefined') {

        $.ajax({
            url: 'buscaPessoaParaEdicao',
            type: 'POST',
            dataType: 'json',
            data: {id: id},
            success: function (result) {

                if (result !== null) {

                    $('#formularioEdicao').html("");

                    var formulario = "<div data-parsley-validate class='form-horizontal form-label-left'>" +
                            "<input type='hidden' id='idPessoa' name='idPessoa' value='" + result.id_pessoa + "'>" +
                            "<label class='col-md-1 col-sm-3 col-xs-12' for='nome'>Nome <span class='required'></label>" +
                            "<input value='" + result.nome_pessoa + "' type='text' id='nome' name='nome' class='form-control col-md-7 col-xs-12'>" +
                            "<label class='col-md-1 col-sm-3 col-xs-12' for='data_nascimento'>Data Nascimento <span class='required'></label>" +
                            "<input value='" + result.data_nascimento + "' type='text' id='data_nascimento' name='data_nascimento' class='form-control col-md-7 col-xs-12'>" +
                            "<label class='col-md-1 col-sm-3 col-xs-12' for='cpf'>CPF <span class='required'></label>" +
                            "<input value='" + result.cpf + "' type='text' id='cpf' name='cpf' class='form-control col-md-7 col-xs-12'>" +
                            "<label class='col-md-1 col-sm-3 col-xs-12' for='rg'>RG <span class='required'></label>" +
                            "<input value='" + result.rg + "' type='text' id='rg' name='rg' class='form-control col-md-7 col-xs-12'>" +
                            "<label class='col-md-1 col-sm-3 col-xs-12' for='email'>Email <span class='required'></label>" +
                            "<input value='" + result.email + "' type='text' id='email' name='email' class='form-control col-md-7 col-xs-12'>" +
                            "<label class='col-md-1 col-sm-3 col-xs-12' for='residencial'>Residencial <span class='required'></label>" +
                            "<input value='" + result.telefone + "' type='text' id='residencial' name='residencial' class='form-control col-md-7 col-xs-12'>" +
                            "<label class='col-md-1 col-sm-3 col-xs-12' for='celular'>Celular <span class='required'></label>" +
                            "<input value='" + result.celular + "' type='text' id='celular' name='celular' class='form-control col-md-7 col-xs-12'>" +
                            "<label class='col-md-1 col-sm-3 col-xs-12' for='contato'>Recado<span class='required'></label>" +
                            "<input value='" + result.contato + "' type='text' id='contato' name='contato' class='form-control col-md-7 col-xs-12'>" +
                            "<label class='col-md-1 col-sm-3 col-xs-12' for='cep'>CEP <span class='required'></label>" +
                            "<input value='" + result.cep + "' type='text' id='cep' name='cep' class='form-control col-md-7 col-xs-12'>" +
                            "<label class='col-md-1 col-sm-3 col-xs-12' for='rua'>Rua <span class='required'></label>" +
                            "<input value='" + result.rua + "' type='text' id='rua' name='rua' class='form-control col-md-7 col-xs-12'>" +
                            "<label class='col-md-1 col-sm-3 col-xs-12' for='bairro'>Bairro<span class='required'></label>" +
                            "<input value='" + result.bairro + "' type='text' id='bairro' name='bairro' class='form-control col-md-7 col-xs-12'>" +
                            "<label class='col-md-1 col-sm-3 col-xs-12' for='cidade'>Cidade<span class='required'></label>" +
                            "<input value='" + result.cidade + "' type='text' id='cidade' name='cidade' class='form-control col-md-7 col-xs-12'>" +
                            "<label class='col-md-1 col-sm-3 col-xs-12' for='estado'>Estado <span class='required'></label>" +
                            "<input value='" + result.estado + "' type='text' id='estado' name='estado' class='form-control col-md-7 col-xs-12'>" +
                            "<label class='col-md-1 col-sm-3 col-xs-12' for='numero'>Número <span class='required'></label>" +
                            "<input value='" + result.numero + "' type='text' id='numero' name='numero' class='form-control col-md-7 col-xs-12'>" +
                            "<label class='col-md-1 col-sm-3 col-xs-12' for='complemento'>Complemento<span class='required'></label>" +
                            "<input value='" + result.complemento + "' type='text' id='complemento' name='complemento' class='form-control col-md-7 col-xs-12'>" +
                            "</div>";

                    $('#formularioEdicao').append(formulario);
                    $("#modalEdit").modal("show");
                }
            }
        });
    }
}

function excluir(id) {

    if (id !== null && id !== 'undefined') {

        $("#modalDelete").modal("show");

        $.ajax({
            url: 'buscaPessoaParaExclusao',
            type: 'POST',
            dataType: 'json',
            data: {id: id},
            success: function (result) {

                if (result !== null) {

                    $('#pessoa').html("");

                    var pessoa = "<p>Deseja realmente excluir " + result.nome_pessoa + " e todos os seus registros?</p>" +
                            "<input type='hidden' id='idPessoa' name='idPessoa' value='" + result.id_pessoa + "'>";

                    $('#pessoa').append(pessoa);
                }
            }
        });
    }
}

$(document).ready(function () {
    pessoas.init();

});



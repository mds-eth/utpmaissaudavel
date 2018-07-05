var pessoas = {

    init: function () {

        date = new Date();
        days = {1: '01', 2: '02', 3: '03', 4: '04', 5: '05', 6: '06', 7: '07', 8: '08', 9: '09'};
        months = {1: '01', 2: '02', 3: '03', 4: '04', 5: '05', 6: '06', 7: '07', 8: '08', 9: '09', 10: '10', 11: '11', 11: '12'};

        if (date.getDate() <= 9) {
            currentDate = days[date.getDate()] + '/' + months[date.getMonth() + 1] + '/' + date.getFullYear();
        } else {
            currentDate = date.getDate() + '/' + months[date.getMonth() + 1] + '/' + date.getFullYear();
        }

        $('#cep').on('blur', pessoas.buscaCep);
        $('#cpf').on('blur', pessoas.validaCpf);
        $('#limpar').on('click', pessoas.limparCampos);
        $('.inativar').on('click', pessoas.modalInativar);
        $('#gravar').on('click', pessoas.validaCamposForm);
        $('#notificacao').on('click', pessoas.notificacoes);
        $('#data_nascimento').on('blur', pessoas.validaCampoData);
        $('.reativar').on('click', pessoas.buscaPessoaParaReativar);
        $('#btn-modal-inativar').on('click', pessoas.inativarPessoa);
        $('#btn-reativar-pessoa').on('click', pessoas.reativarPessoa);
        $('#perfil').on('change', pessoas.montaInputPerfilSelecionado);
        $('#btn-editar-pessoa').on('click', pessoas.validaCamposEditar);
        $('#editarPessoa').on('click', pessoas.abrirCamposPessoaEdicao);

    },

    validaCampoData: function () {

        if (pessoas.convertData($('#data_nascimento').val()) > pessoas.convertData(currentDate)) {
            $('#data_nascimento').focus();
            $('#data_nascimento').css('border', '1px solid red');
            swal("Atenção!", "Informe uma data válida!", "error");
            $('#data_nascimento').val("");
            return;
        }
    },

    buscaCep: function () {

        var cep = $('#cep').val();
        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

            if (!("erro" in dados)) {

                $("#rua").val(dados.logradouro);
                $("#bairro").val(dados.bairro);
                $("#cidade").val(dados.localidade);
                $("#estado").val(dados.uf);
                $("#numero").focus();
            }
        });
    },
    validaCpf: function () {

        $.ajax({
            url: 'validaCpf',
            type: 'POST',
            data: {cpf: $('#cpf').val()},
            dataType: 'json',
            success: function (result) {

                if (result) {
                    $("#cpf").val("");
                    $("#cpf").focus();
                    $('#cpf').css('border', '1px solid red');
                    swal("Atenção!", "Já existe outra pessoa cadastrada com este CPF, favor verificar!", "error");
                    return;
                }
            }
        });
    },

    limparCampos: function () {

        $('#nome').val("");
        $('#data_nascimento').val("");
        $('#sexo').val("");
        $('#cpf').val("");
        $('#rg').val("");
        $('#email').val("");
        $('#cep').val("");
        $('#rua').val("");
        $('#bairro').val("");
        $('#cidade').val("");
        $('#estado').val("");
        $('#numero').val("");
        $('#complemento').val("");
        $('#residencial').val("");
        $('#celular').val("");
        $('#contato').val("");
    },
    modalInativar: function () {

        $.ajax({
            url: URL + '/pessoas/buscaPessoaParaInativar',
            type: 'POST',
            dataType: 'json',
            data: {id: $(this).val()},
            success: function (result) {

                $('#pessoa').html("");

                var pessoa = "<p>Deseja realmente inativar " + result.nome_pessoa + "?</p>" +
                        "<input type='hidden' id='idPessoa' name='idPessoa' value='" + result.id_pessoa + "'>";

                $('#pessoa').append(pessoa);
                $("#modal-inativar-pessoa").modal("show");

            }
        });
    },
    validaCamposForm: function () {

        if ($('#nome').val() === '') {
            $('#nome').focus();
            $('#nome').css('border', '1px solid red');
            swal("Atenção!", "Campo nome não pode ficar vazio!", "error");
            return;
        }
        if ($('#data_nascimento').val() === '') {
            $('#data_nascimento').focus();
            $('#data_nascimento').css('border', '1px solid red');
            swal("Atenção!", "Campo Data de Nascimento não pode ficar vazio!", "error");
            return;
        }

        if ($('#data_nascimento').val().length < 10) {
            $('#data_nascimento').focus();
            $('#data_nascimento').css('border', '1px solid red');
            swal("Atenção!", "Informe uma data válida!", "error");
            return false;
        }

        if ($('#sexo').val() === 'Selecione') {
            $('#data_nascimento').focus();
            $('#sexo').css('border', '1px solid red');
            swal("Atenção!", "Selecione uma opção válida!", "error");
            return;
        }
        if ($('#rg').val() === '') {
            $('#rg').focus();
            $('#rg').css('border', '1px solid red');
            swal("Atenção!", "Campo RG não pode ficar vazio!", "error");
            return;
        }
        if ($('#email').val() === '') {
            $('#email').focus();
            $('#email').css('border', '1px solid red');
            swal("Atenção!", "Campo Email  não pode ficar vazio!", "error");
            return;
        }
        if ($('#cep').val() === '') {
            $('#cep').focus();
            $('#cep').css('border', '1px solid red');
            swal("Atenção!", "Campo CEP  não pode ficar vazio!", "error");
            return;
        }
        if ($('#rua').val() === '') {
            $('#rua').focus();
            $('#rua').css('border', '1px solid red');
            swal("Atenção!", "Campo Rua  não pode ficar vazio!", "error");
            return;
        }
        if ($('#bairro').val() === '') {
            $('#bairro').focus();
            $('#bairro').css('border', '1px solid red');
            swal("Atenção!", "Campo Bairro  não pode ficar vazio!", "error");
            return;
        }
        if ($('#cidade').val() === '') {
            $('#cidade').focus();
            $('#cidade').css('border', '1px solid red');
            swal("Atenção!", "Campo Cidade  não pode ficar vazio!", "error");
            return;
        }
        if ($('#estado').val() === '') {
            $('#estado').focus();
            $('#estado').css('border', '1px solid red');
            swal("Atenção!", "Campo Estado  não pode ficar vazio!", "error");
            return;
        }
        if ($('#numero').val() === '') {
            $('#numero').focus();
            $('#numero').css('border', '1px solid red');
            swal("Atenção!", "Campo Número  não pode ficar vazio!", "error");
            return;
        }
        if ($('#complemento').val() === '') {
            $('#complemento').focus();
            $('#complemento').css('border', '1px solid red');
            swal("Atenção!", "Campo Complemento  não pode ficar vazio!", "error");
            return;
        }
        if ($('#celular').val() === '') {
            $('#celular').focus();
            $('#celular').css('border', '1px solid red');
            swal("Atenção!", "Campo Telefone Celular não pode ficar vazio!", "error");
            return;
        }
        if ($('#contato').val() === '') {
            $('#contato').focus();
            $('#contato').css('border', '1px solid red');
            swal("Atenção!", "Campo Telefone Para Contato não pode ficar vazio!", "error");
            return;
        }
        if ($('#perfil').val() === 'Selecione') {
            swal("Atenção!", "Selecione uma opção válida!", "error");
            $('#perfil').css('border', '1px solid red');
            return;
        }
        if ($('#codigo').val() === '') {
            $('#codigo').focus();
            $('#codigo').css('border', '1px solid red');
            swal("Atenção!", "Informe uma valor para o campo em destaque!", "error");
            return;
        }

        pessoas.gravar();
    },
    notificacoes: function () {

        alert('cheguei aqui');
    },
    reativarPessoa: function () {

        $.ajax({
            url: URL + '/pessoas/reativarPessoa',
            type: 'POST',
            data: {id: $('#pessoa').val()},
            success: function (result) {

                if (result) {
                    swal({
                        text: "Pessoa reativada com Sucesso!",
                        type: "success"
                    });
                    setTimeout(function () {
                        window.location.href = URL + '/pessoas/listagem';
                    }, 1000);
                }
            }
        });
    },
    inativarPessoa: function () {

        $.ajax({
            url: URL + '/pessoas/inativarPessoa',
            type: 'POST',
            dataType: 'json',
            data: {idPessoa: $('#idPessoa').val()},
            success: function (result) {

                if (result) {
                    swal({text: "Pessoa inativada com Sucesso!", type: "success"});
                    setTimeout(function () {
                        window.location.href = URL + '/pessoas/listagem';
                    }, 1000);
                }
            }
        });
    },
    buscaPessoaParaReativar: function () {

        $.ajax({
            url: URL + '/pessoas/buscaPessoaParaReativar',
            data: {id: $(this).val()},
            type: 'POST',
            dataType: 'json',
            success: function (result) {

                $('#body-modal-reativar').html("");
                var text = "<p>Deseja realmente reativar " + result.nome_pessoa + "?</p>" +
                        "<input type='hidden' id='pessoa' name='pessoa' value='" + result.id_pessoa + "'>";
                $('#body-modal-reativar').append(text);
                $('#modal-reativar').modal('show');
            }
        });
    },
    validaCamposEditar: function () {

        if ($('#nome').val() === '') {
            $('#nome').focus();
            $('#nome').css('border', '1px solid red');
            swal("Atenção!", "Campo nome não pode ficar vazio!", "error");
            return;
        }
        if ($('#data_nascimento').val() === '') {
            $('#data_nascimento').focus();
            $('#data_nascimento').css('border', '1px solid red');
            swal("Atenção!", "Campo Data de Nascimento não pode ficar vazio!", "error");
            return;
        }

        if ($('#data_nascimento').val().length < 10) {
            $('#data_nascimento').focus();
            $('#data_nascimento').css('border', '1px solid red');
            swal("Atenção!", "Informe uma data válida!", "error");
            return false;
        }
        if ($('#rg').val() === '') {
            $('#rg').focus();
            $('#rg').css('border', '1px solid red');
            swal("Atenção!", "Campo RG não pode ficar vazio!", "error");
            return;
        }
        if ($('#email').val() === '') {
            $('#email').focus();
            $('#email').css('border', '1px solid red');
            swal("Atenção!", "Campo Email  não pode ficar vazio!", "error");
            return;
        }
        if ($('#cep').val() === '') {
            $('#cep').focus();
            $('#cep').css('border', '1px solid red');
            swal("Atenção!", "Campo CEP  não pode ficar vazio!", "error");
            return;
        }
        if ($('#rua').val() === '') {
            $('#rua').focus();
            $('#rua').css('border', '1px solid red');
            swal("Atenção!", "Campo Rua  não pode ficar vazio!", "error");
            return;
        }
        if ($('#bairro').val() === '') {
            $('#bairro').focus();
            $('#bairro').css('border', '1px solid red');
            swal("Atenção!", "Campo Bairro  não pode ficar vazio!", "error");
            return;
        }
        if ($('#cidade').val() === '') {
            $('#cidade').focus();
            $('#cidade').css('border', '1px solid red');
            swal("Atenção!", "Campo Cidade  não pode ficar vazio!", "error");
            return;
        }
        if ($('#estado').val() === '') {
            $('#estado').focus();
            $('#estado').css('border', '1px solid red');
            swal("Atenção!", "Campo Estado  não pode ficar vazio!", "error");
            return;
        }
        if ($('#numero').val() === '') {
            $('#numero').focus();
            $('#numero').css('border', '1px solid red');
            swal("Atenção!", "Campo Número  não pode ficar vazio!", "error");
            return;
        }
        if ($('#complemento').val() === '') {
            $('#complemento').focus();
            $('#complemento').css('border', '1px solid red');
            swal("Atenção!", "Campo Complemento  não pode ficar vazio!", "error");
            return;
        }
        if ($('#celular').val() === '') {
            $('#celular').focus();
            $('#celular').css('border', '1px solid red');
            swal("Atenção!", "Campo Telefone Celular não pode ficar vazio!", "error");
            return;
        }
        if ($('#contato').val() === '') {
            $('#contato').focus();
            $('#contato').css('border', '1px solid red');
            swal("Atenção!", "Campo Telefone Para Contato não pode ficar vazio!", "error");
            return;
        }
        pessoas.editarRegistro();
    },
    montaInputPerfilSelecionado: function () {

        $('#nomeLabel').html("");
        var perfil = $('#perfil').val();
        $('#perfilSelecionado').html("");
        var input = "<input id='codigo' name='codigo' class='form-control' type='text'/>";

        if (parseInt(perfil) === 3) {

            var label = "CREFFITO *";
            $('#nomeLabel').append(label);
            $('#perfilSelecionado').append(input);

        } else if (parseInt(perfil) === 5) {

            var label = "RA *";
            $('#nomeLabel').append(label);
            $('#perfilSelecionado').append(input);

        } else if (parseInt(perfil) === 7) {

            var label = "CRM *";
            $('#nomeLabel').append(label);
            $('#perfilSelecionado').append(input);

        } else {

            $('#nomeLabel').html("");
            $('#perfilSelecionado').html("");
        }
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
                estado: $('#estado').val(),
                numero: $('#numero').val(),
                complemento: $('#complemento').val(),
                perfil: $('#perfil').val(),
                codigo: $('#codigo').val()

            },
            success: function (retorno) {

                if (retorno) {
                    swal({
                        text: "Cadastro realizado com Sucesso!",
                        type: "success"
                    });
                    setTimeout(function () {
                        window.location.href = URL + '/pessoas/listagem';
                    }, 1000);
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
    editarRegistro: function () {

        $.ajax({
            url: URL + '/pessoas/editar',
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
                    swal({text: "Registro atualizado com Sucesso!", type: "success"});
                    setTimeout(function () {
                        window.location = URL + '/pessoas/listagem';
                    }, 1000);
                }
            }
        });
    },

    abrirCamposPessoaEdicao: function () {

        $('#nome').prop('readonly', false);
        $('#nome').prop('readonly', false);
        $('#data_nascimento').prop('readonly', false);
        $('#sexo').prop('readonly', false);
        $('#cpf').prop('readonly', false);
        $('#rg').prop('readonly', false);
        $('#email').prop('readonly', false);
        $('#cep').prop('readonly', false);
        $('#rua').prop('readonly', false);
        $('#bairro').prop('readonly', false);
        $('#cidade').prop('readonly', false);
        $('#estado').prop('readonly', false);
        $('#numero').prop('readonly', false);
        $('#complemento').prop('readonly', false);
        $('#residencial').prop('readonly', false);
        $('#celular').prop('readonly', false);
        $('#contato').prop('readonly', false);

        $('#btn-editar-pessoa').html("");
        var btn = "<button id='editPessoa' name='editPessoa' class='editPessoa btn btn-success btn-xs'>Salvar Alterações</button>";
        $('#btn-editar-pessoa').append(btn);
        $('#editarPessoa').hide();
    },

    convertData: function (data) {

        var dia = data.split("/")[0];
        var mes = data.split("/")[1];
        var ano = data.split("/")[2];

        return ano + '-' + ("0" + mes).slice(-2) + '-' + ("0" + dia).slice(-2);

    }
};
$(document).ready(function () {
    pessoas.init();
});



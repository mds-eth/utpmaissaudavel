var pacientes = {

    init: function () {

        $('#gravar').on('click', pacientes.gravar);
    },

    validaCamposForm: function () {

        if ($('#nome').val() === '') {
            $('#nome').focus();
            $('#nome').css('border', '1px solid red');
            return;
        }

        if ($('#data_nascimento').val() === '') {
            $('#data_nascimento').focus();
            $('#data_nascimento').css('border', '1px solid red');
            return;
        }

        if ($('#mae').val() === '') {
            $('#mae').focus();
            $('#mae').css('border', '1px solid red');
            return;
        }

        if ($('#sexo').val() === '') {
            $('#sexo').focus();
            $('#sexo').css('border', '1px solid red');
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

        if ($('#unidade').val() === '') {
            $('#unidade').focus();
            $('#unidade').css('border', '1px solid red');
            return;
        }

        if ($('#especialidade').val() === '') {
            $('#especialidade').focus();
            $('#especialidade').css('border', '1px solid red');
            return;
        }

        pacientes.gravar();
    },

    gravar: function () {

        $.ajax({
            type: 'POST',
            url: 'cadastrar',
            data: {
                nome: $('#nome').val(),
                dataNascimento: $('#data_nascimento').val(),
                mae: $('#mae').val(),
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
                unidade: $('#unidade').val(),
                especialidade: $('#especialidade').val()
            },
            success: function (retorno) {

                console.log(retorno);
                return;

                if (retorno) {

                    swal({
                        title: "Cadastrado com Sucesso!",
                        icon: "success"
                    });

                    setTimeout(function () {
                        window.location = URL + '/pacientes/visualizar';
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
};



$(document).ready(function () {

    pacientes.init();

});
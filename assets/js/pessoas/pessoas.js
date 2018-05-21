var pessoas = {

    init: function () {

        $('#gravar').on('click', pessoas.gravar);
        $('#cep').on('blur', pessoas.buscaCep);
        $('#cpf').on('blur', pessoas.validaCpf);
    },

    /* form: function () {
     
     if ($('#nome').val() == '') {
     
     $('#nome').vali
     
     $('#nome').focus();
     $('#body').html('<center><i class="fa fa-hand-o-right fa-lg"></i> Informe o Nome.</center>');
     $('#modal').modal('show');
     
     return;
     }
     if ($('#data_nascimento').val() == '') {
     $('#data_nascimento').focus();
     $('#body').html('<center><i class="fa fa-hand-o-right fa-lg"></i> Informe da Data de Nascimento.</center>');
     $('#modal').modal('show');
     
     return;
     }
     if ($('#sexo').val() == '') {
     $('#sexo').focus();
     $('#body').html('<center><i class="fa fa-hand-o-right fa-lg"></i> Informe o sexo.</center>');
     $('#modal').modal('show');
     
     return;
     }
     if ($('#cpf').val() == '') {
     $('#cpf').focus();
     $('#body').html('<center><i class="fa fa-hand-o-right fa-lg"></i> Informe o CPF.</center>');
     $('#modal').modal('show');
     
     return;
     }
     
     if ($('#rg').val() == '') {
     $('#rg').focus();
     $('#body').html('<center><i class="fa fa-hand-o-right fa-lg"></i> Informe o RG.</center>');
     $('#modal').modal('show');
     
     return;
     }
     
     if ($('#email').val() == '') {
     $('#email').focus();
     $('#body').html('<center><i class="fa fa-hand-o-right fa-lg"></i> Informe o Email.</center>');
     $('#modal').modal('show');
     
     return;
     }
     
     if ($('#residencial').val() == '') {
     $('#residencial').focus();
     $('#body').html('<center><i class="fa fa-hand-o-right fa-lg"></i> Informe o Telefone Residencial.</center>');
     $('#modal').modal('show');
     
     return;
     }
     
     if ($('#celular').val() == '') {
     $('#celular').focus();
     $('#body').html('<center><i class="fa fa-hand-o-right fa-lg"></i> Informe o número de Celular.</center>');
     $('#modal').modal('show');
     
     return;
     }
     
     pessoas.gravar();
     
     },*/

    gravar: function (e) {

        e.preventDefault();
        //var dados = $('#formUsuario').serialize();

        $.post({
            type: 'POST',
            url: 'cadastrar',
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
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
                return;
            }
        });
    },

    buscaCep: function () {

        var cep = $('#cep').val();

        $.ajax({
            url: 'buscaCep',
            type: 'GET',
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
            type: 'GET',
            data: {cpf: cpf},
            dataType: 'json',
            success: function (result) {

            }
        });

    }
};

$(document).ready(function () {
    pessoas.init();
});
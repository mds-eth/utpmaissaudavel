$(document).ready(function () {

    $('#formUsuario').submit(function (e) {

        e.preventDefault();

        var dados = $('#formUsuario').serialize();

        try {

            $.ajax({

                type: 'GET',
                url: 'usuarios/cadastrar',
                data: {dados: dados},
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function (retorno) {

                }
            });

        } catch (e) {

        }

    });

    $('#cep').blur(function () {

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
                } else {
                    alert('Endereço não encontrado');
                }
            }
        });
        return false;
    });
});
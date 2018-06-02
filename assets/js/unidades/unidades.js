var unidades = {

    init: function () {

        $("#btnEditar").on('click', unidades.validarCampoEditar);
        $("#btnExcluir").on('click', unidades.validarCampoExcluir);
        $('#gravar').on('click', unidades.validar);

    },

    validar: function () {

        if ($('#unidade').val() === '') {
            $('#unidade').focus();
            $('#unidade').css('border', '1px solid red');
            return;
        } else {
            unidades.gravar();
        }
    },

    gravar: function () {

        $.ajax({
            url: 'cadastrar',
            type: 'POST',
            contentType: "application/x-www-form-urlencoded;charset=utf-8",
            data: {unidade: $('#unidade').val()},
            success: function (retorno) {

                if (retorno) {
                    swal({
                        title: "Cadastrado com Sucesso!",
                        icon: "success"
                    }, window.location = URL + '/unidades/visualizar');



                } else {
                    swal({
                        type: 'warning',
                        title: 'Ocorreu algum erro ao realizar o cadastro, revise todos os dados informados',
                        confirmButtonText: 'OK'
                    });
                    return;
                }
            }
        }, 'json');
    },

    validarCampoEditar: function () {

        if ($('#unidade').val() === '') {
            $('#unidade').focus();
            $("#unidade").css('border', '1px solid red');
            return;
        }

        unidades.editarUnidade();
    },

    editarUnidade: function () {

        $.ajax({

            url: 'editar',
            type: 'POST',
            dataType: 'json',
            data: {
                unidade: $('#unidade').val(),
                idUnidade: $('#idUnidade').val()
            },
            success: function (result) {

                if (result) {
                    swal({
                        title: "Registro alterado com Sucesso!",
                        icon: "success"
                    }, window.location = URL + '/unidades/visualizar');
                }
            }
        });
    },

    validarCampoExcluir: function () {

        if ($('#unidade').val() === '') {
            $('#unidade').focus();
            $("#unidade").css('border', '1px solid red');
            return;
        }

        unidades.excluirUnidade();
    },

    excluirUnidade: function () {

        $.ajax({

            url: 'excluir',
            type: 'POST',
            dataType: 'json',
            data: {idUnidade: $('#idUnidade').val()},
            success: function (result) {

                if (result) {
                    swal({
                        title: "Registro excluido com Sucesso!",
                        icon: "success"
                    }, window.location = URL + '/unidades/visualizar');
                }
            }
        });
    }
};

function editar(id) {

    $.ajax({

        url: 'buscaUnidadeParaEdicao',
        type: 'POST',
        dataType: 'json',
        data: {id: id},
        success: function (result) {

            $("#formularioEdicao").html("");

            var input = "<div data-parsley-validate class='form-horizontal form-label-left'>" +
                    "<input type='hidden' id='idUnidade' value='" + result.id_unidade_de_saude + "'>" +
                    "<label for='nome'>Unidade de Saúde <span class='required'></label>" +
                    "<input value='" + result.nome + "' type='text' id='unidade' name='unidade' class='form-control col-md-7 col-xs-12'>";


            $('#formularioEdicao').append(input);

            $("#modalEdit").modal();

        }
    });
}


function excluir(id) {

    $.ajax({

        url: 'buscaUnidadeParaExclusao',
        type: 'POST',
        dataType: 'json',
        data: {id: id},
        success: function (result) {

            $("#formularioExclusao").html("");

            var input = "<div data-parsley-validate class='form-horizontal form-label-left'>" +
                    "<input type='hidden' id='idUnidade' value='" + result.id_unidade_de_saude + "'>" +
                    "<p>Deseja realmente excluir unidade " + result.nome + "?</p>";

            $('#formularioExclusao').append(input);

            $("#modalDelete").modal();


        }
    });
}

$(document).ready(function () {
    unidades.init();
});
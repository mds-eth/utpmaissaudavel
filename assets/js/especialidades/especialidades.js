var especialidades = {

    init: function () {

        $('#gravar').on('click', especialidades.validarCampos);
        $('#editar').on('click', especialidades.abrirCamposParaEdicao);
        $('#botaoOculto').on('click', especialidades.validarCamposEditar);
        $('.excluir').on('click', especialidades.buscaEspecialidadeParaExcluir);
    },

    validarCampos: function () {

        if ($('#especialidade').val() === '') {
            $('#especialidade').focus();
            $('#especialidade').css('border', '1px solid red');
            swal("Atenção!", "Campo nome não pode ficar vazio!", "error");
            return;
        }

        if ($('#cor').val() === '') {
            $('#cor').focus();
            $('#especialidade').css('border', '1px solid red');
            swal("Atenção!", "Campo cor não pode ficar vazio!", "error");
            return;
        }

        if ($('#descricao').val() === '') {
            $('#descricao').focus();
            $('#descricao').css('border', '1px solid red');
            swal("Atenção!", "Campo descrição não pode ficar vazio!", "error");
            return;
        }

        especialidades.gravar();
    },

    abrirCamposParaEdicao: function () {

        $('#especialidade').prop('readonly', false);
        $('#descricao').prop('readonly', false);
        $('#cor').prop('readonly', false);

        $('#editar').hide();

        var btn = "<button class='btn btn-success btn-xs'>Salvar Alterações</button>";
        $('#botaoOculto').append(btn);
    },

    validarCamposEditar: function () {


        if ($('#especialidade').val() === '') {
            $('#especialidade').focus();
            $('#especialidade').css('border', '1px solid red');
            swal("Atenção!", "Campo nome não pode ficar vazio!", "error");
            return;
        }

        if ($('#cor').val() === '') {
            $('#cor').focus();
            $('#especialidade').css('border', '1px solid red');
            swal("Atenção!", "Campo cor não pode ficar vazio!", "error");
            return;
        }

        if ($('#descricao').val() === '') {
            $('#descricao').focus();
            $('#descricao').css('border', '1px solid red');
            swal("Atenção!", "Campo descrição não pode ficar vazio!", "error");
            return;
        }

        especialidades.editarEspecialidade();
    },

    editarEspecialidade: function () {

        $.ajax({
            url: URL + '/especialidades/editarEspecialidade',
            type: 'POST',
            data: {
                id: $('#id').val(),
                especialidade: $("#especialidade").val(),
                cor: $('#cor').val(),
                descricao: $('#descricao').val()
            },
            success: function (result) {

                if (result) {
                    swal({
                        text: "Especialidade alterada com Sucesso!",
                        type: "success",
                        confirmButtonText: "OK"
                    });
                    window.location = URL + '/especialidades/visualizar';
                } else {
                    swal({
                        type: 'warning',
                        title: 'Ocorreu algum erro na edição do registro, revise todos os campos!',
                        confirmButtonText: 'OK'
                    });
                    return;
                }
            }
        });
    },

    buscaEspecialidadeParaExcluir: function () {

        $.ajax({
            url: URL + '/especialidades/buscaEspecialidade',
            type: 'POST',
            data: {id: $(this).val()},
            dataType: 'json',
            success: function (result) {

                $('#formularioEdicao').html("");

                var especialidade = "<input type='text' class='form-control' id='especialidade' name='especialidade' value='" + result[0].especialidade + "' /><br>" +
                        "<input type='hidden' id='id_especialidade' value='" + result[0].id_especialidade + "' />" +
                        "<input type='text' id='cor' class='form-control' name='cor' value='" + result[0].cor + "' />" +
                        "<input type='textarea' cols='10' rows='10' class='form-control' id='descricao' name='descricao' value='" + result[0].descricao + "' />";

                $('#formularioEdicao').append(especialidade);
                $('#modalDelete').modal("show");
            }
        });

    },

    gravar: function () {

        $.ajax({
            type: 'POST',
            url: 'cadastrar',
            dataType: 'json',
            data: {
                especialidade: $('#especialidade').val(),
                cor: $('#cor').val(),
                descricao: $('#descricao').val()
            },
            success: function (result) {

                if (result) {
                    swal({
                        title: "Cadastrado com Sucesso!",
                        icon: "success"
                    });
                    setTimeout(function () {
                        window.location = URL + '/especialidades/visualizar';
                    }, 2000);

                } else {
                    swal({
                        type: 'warning',
                        title: 'Especialidade já cadastrado com este nome',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    }
};

$(document).ready(function () {
    especialidades.init();
});

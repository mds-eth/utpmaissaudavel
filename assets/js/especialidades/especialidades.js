var especialidades = {

    init: function () {

        $('#gravar').on('click', especialidades.validarCampos);
    },

    validarCampos: function () {

        if ($('#especialidade').val() === '') {
            $('#especialidade').focus();
            $('#especialidade').css('border', '1px solid red');
            return;
        }

        if ($('#descricao').val() === '') {
            $('#descricao').focus();
            $('#descricao').css('border', '1px solid red');
            return;
        }

        especialidades.gravar();
    },

    gravar: function () {

        $.ajax({
            type: 'POST',
            url: 'cadastrar',
            dataType: 'json',
            data: {
                especialidade: $('#especialidade').val(),
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
var perfil = {

    init: function () {
        $('#gravar').on('click', perfil.cadastrar);
    },

    cadastrar: function () {
        $.ajax({
            type: 'POST',
            url: 'cadastrar',
            data: {
                perfil: $('#perfil').val()
            },
            success: function (result) {

                if (result) {
                    swal({
                        text: "Cadastro realizado com Sucesso!",
                        type: "success",
                        closeOnConfirm: false,
                        confirmButtonText: "OK"
                    }, function () {
                        window.location.href = URL + '/perfis/visualizar';

                    });
                } else {
                    swal({
                        type: 'warning',
                        title: 'Perfil já cadastrado com este nome',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    }
};
$(document).ready(function () {
    perfil.init();
});
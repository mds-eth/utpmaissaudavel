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
                    window.location = URL + '/perfis/visualizar';
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
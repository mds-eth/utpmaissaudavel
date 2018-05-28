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
                        title: "Cadastrado com Sucesso!",
                        icon: "success"
                    });
                    setTimeout(function () {
                        window.location = URL + '/perfis/visualizar';
                    }, 2000);

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
var urls = {

    init: function () {
        $('#gravar').on('click', urls.cadastrar);
    },

    cadastrar: function () {
        $.ajax({
            type: 'POST',
            url: 'cadastrar',
            data: {
                url: $('#url').val(),
                perfil: $('#profile').val()
            },
            success: function (result) {
                console.log(result);
                return;
                if (result) {
                    window.location = URL + '/urls/visualizar';
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
    urls.init();
});
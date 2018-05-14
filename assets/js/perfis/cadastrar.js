$(document).ready(function () {

    $('#formPerfil').submit(function (e) {

        e.preventDefault();
        var perfil = $('#perfil').val();
        
        alert(perfil);

        $.ajax({

            type: 'GET',
            url: 'perfis/cadastrar',
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            data: {perfil: perfil},
            success: function (retorno) {

                if (retorno == 1) {
                    window.location.href = '/perfis/visualizar';
                } else if (retorno === false) {
                    swal({
                        type: 'warning',
                        title: 'Já existe um perfil cadastrado com este nome',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });
});
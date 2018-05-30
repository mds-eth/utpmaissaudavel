var autentica = {
    init: function () {
        $('#logar').on('click', autentica.logar);

    },

    logar: function () {

        $.ajax({
            type: 'POST',
            url: 'login/logar',
            data: {
                email: $('#email').val(),
                senha: $('#senha').val()
            },
            success: function (result) {

                if (result) {
                    window.location = URL + '/home';
                } else {
                    swal({
                        type: 'warning',
                        title: 'Email ou senha incorretos',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    }
};
$(document).ready(function () {
    autentica.init();
});

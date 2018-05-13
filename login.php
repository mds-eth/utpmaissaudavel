<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>UTP Mais Saudável</title>
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet">        
        <link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">                        
        <link href="/assets/css/custom.min.css" rel="stylesheet">
        <link href="/assets/css/custom.css" rel="stylesheet">        
    </head>

    <body class="login">
        <div class="row">           
            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form id="formLogin" novalidate="">
                            <h1>UTP Mais Saudável</h1>
                            <div>
                                <input id="email" name="email" type="text" class="form-control" placeholder="Email" required="required" data-validate-length-range="6" data-validate-words="2" />
                            </div>
                            <div>
                                <input id="senha" name="senha" type="password" class="form-control" placeholder="Senha" required="" />
                            </div>
                            <div>
                                <button class="btn btn-success submit" type="submit" id="logar" name="logar">Logar</button>
                                <a class="reset_pass" href="#">Esqueci minha senha</a>
                            </div>
                        </form>
                    </section>
                </div>                
            </div>
        </div>
        <script type="text/javascript" src="/assets/js/jquery.min.js"></script>    
        <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/sweetAlert.js"></script>
        <script type="text/javascript" src="/assets/js/custom.min.js"></script>
        <script type="text/javascript" src="assets/js/login.js"></script>        
        <script type="text/javascript" src="/assets/js/validator/validator.js"></script>
    </body>
</html>

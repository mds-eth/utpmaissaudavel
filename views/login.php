<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="Michael Douglas Soares">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>UTP Mais Saudável</title>
        <link href="<?php echo URL; ?>/assets/css/bootstrap.min.css" rel="stylesheet">        
        <link href="<?php echo URL; ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">                        
        <link href="<?php echo URL; ?>/assets/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo URL; ?>/assets/css/custom.css" rel="stylesheet">        
    </head>
    <body class="login">
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form>
                        <h1>UTP Mais Saudável</h1>
                        <div>
                            <input id="email" name="email" type="text" class="form-control" placeholder="Email" required="required" data-validate-length-range="6" data-validate-words="2" />
                        </div>
                        <div>
                            <input id="senha" name="senha" type="password" class="form-control" placeholder="Senha" required="" />
                        </div>
                        <br>
                        <div>
                            <button id="logar" class="btn btn-success">Logar</button>
                            <!-- <a class="reset_pass" href="#">Esqueci minha senha</a>-->
                        </div>
                    </form>
                </section>
            </div>            
        </div>        
        <script type="text/javascript">var URL = '<?php echo URL; ?>';</script>
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/jquery/jquery.min.js"></script>    
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/bootstrap/bootstrap.min.js"></script>        
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/custom.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/login/login.js"></script>        
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/validator/validator.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/sweetAlert/sweetAlert.js"></script>
    </body>
</html>

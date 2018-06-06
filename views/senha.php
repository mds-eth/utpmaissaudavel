<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
                        <p>Olá <?= $_SESSION['temp']['nome_pessoa'] ?>, verificamos que é seu primeiro acesso ao UTP Mais Saudável. Para isso cadastre
                            uma nova senha que será usada somente por você.</p>
                        <div>
                            <input type="hidden" id="id" value="<?= $_SESSION['temp']['id_pessoa'] ?>">
                            <input id="senha" name="senha" type="password" class="form-control" placeholder="Senha" required="required"/>
                        </div>
                        <div>
                            <input id="confirmar" name="confirmar" type="password" class="form-control" placeholder="Confirmar Senha" required="required" />
                        </div>
                        <br>
                        <div>
                            <button id="cadastrar" class="btn btn-success">Cadastrar</button>                            
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
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/sweetAlert/sweetAlert.js"></script>
    </body>
</html>

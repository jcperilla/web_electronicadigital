<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cambiar contraseña :: Parqueadero Uniquindio</title>
</head>
<body>
    <?php require 'views/shared/__header.php' ?>
    <div class="main container">
        <form class="form-login" action="<?php echo constant('URL'); ?>" method="POST">
            <?php
                if(isset($this->message_error)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $this->message_error ?>
                    </div>
                <?php 
                }
            ?>
            <div class="text-center mb-4">
                <img class="mb-4" src="<?php echo constant('URL'); ?>public/img/logo.png" alt="" width="130" height="130">
                <h1 class="h3 mb-3 font-weight-normal">Cambiar Contraseña</h1>
            </div>

            <div class="form-label-group">
                <input type="password" id="inputPassword1" class="form-control" placeholder="Contraseña Nueva" required="" autofocus="" name="email">
            </div>
            <BR/>
            <div class="form-label-group">
                <input type="password" id="inputPassword2" class="form-control" placeholder="Repetir Contraseña" required="" name="password">
            </div>
            <BR/>

            <button class="btn btn-lg btn-success btn-block" type="submit">Cambiar</button>

        </form>
    </div>
    <?php require 'views/shared/__footer.php' ?>
</body>
</html>
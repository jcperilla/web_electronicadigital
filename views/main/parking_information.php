<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta Parqueadero Medicina</title>
</head>
<body>
    <?php require 'views/shared/__header.php' ?>

        <form class="form-parking" action="<?php echo constant('URL'); ?>main/consulta" method="POST">
        <div class="container">
        <div class="row justify-content-md-center">

        <div class="col col-lg-6">

            <?php
                if(isset($this->message_error)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $this->message_error ?>
                    </div>
                <?php 
                }
            ?>
            <BR/>
            <div class="text-center mb-4">
                <img class="mb-4" src="<?php echo constant('URL'); ?>public/img/logo.png" alt="" width="72" height="72">
                <h1 class="display-5">Consultar disponibilidad de parqueadero <i class="fas fa-motorcycle"></i></h1>
            </div>

            <div class="form-label-group">
                <label for="available"><strong> Disponibles</strong></label>
                <input type="text" id="available" class="form-control" placeholder="" required="" autofocus="" name="available" value="<?php echo $this->cant_available;?>">
                
            </div>
            <BR/>
            <div class="form-label-group">
                <label for="available"><strong> Ocupados </strong></label>
                <input type="text" id="available" class="form-control" placeholder="" required="" autofocus="" name="available" value="<?php echo $this->cant_busy;?>">    
            </div>

            <BR/>
            <?php
                Session::init();
                $type = Session::get('user')['type_user'];
                if($type== 2) { ?>
                    <div class="row">
                        <div class="col-sm-6" style="margin-bottom: 10px">
                            <button id="buttonIN" class="btn btn-lg btn-success btn-block" type="submit"><i class="fas fa-arrow-circle-up fa-5x"></i></button>
                        </div>

                        <div class="col-sm-6">
                            <button id="buttonOUT" class="btn btn-lg btn-danger btn-block" type="submit"><i class="fas fa-arrow-circle-down fa-5x"></i></button>
                        </div>
                    </div>
            <?php    }
            ?>
        </div>
        </div>
        </div>
        </form>
    <?php require 'views/shared/__footer.php' ?>

</body>
</html>

<script type="text/javascript" src="<?php echo constant('URL')?>public/js/util.js">

</script>
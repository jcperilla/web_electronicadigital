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
                            <img class="mb-4" src="<?php echo constant('URL'); ?>public/img/logo.png" alt="" width="130" height="130">
                            <h1 class="display-5">Consultar disponibilidad Parqueadero Medicina <i class="fas fa-motorcycle"></i></h1>
                        </div>
                        <br><br>
                        <div class="row  div-info">
                            <div class="col-sm-6">
                                <h3 for="available"><strong> Disponibles </strong></h3>
                                <p id="can_available_txt"><?php echo $this->cant_available;?></p>
                            </div>
                            <div class="col-sm-6">
                                <h3 for="available"><strong> Ocupados </strong></h3>
                                <p id="cant_busy_txt"><?php echo $this->cant_busy;?></p>
                            </div>
                        </div>
                        <BR/>
                    </div>
                </div>
            </div>
        </form>
        <div class="container">
                <?php
                    Session::init();
                    $type = Session::get('user')['type_user'];
                    if($type== 2) { ?>
                        <div class="row">
                            <div class="col-sm-6" style="margin-bottom: 10px">
                                <button id="buttonIN" class="btn btn-lg btn-success btn-block" onclick="update_quotas(1)"><p class="font-weight-bold">Ingreso</p><i class="fas fa-arrow-circle-up fa-5x"></i></button>
                            </div>

                            <div class="col-sm-6">
                                <button id="buttonOUT" class="btn btn-lg btn-danger btn-block" onclick="update_quotas(0)"><p class="
                                    font-weight-bold">Salida</p><i class="fas fa-arrow-circle-down fa-5x"></i></button>
                            </div>
                        </div>
                <?php    }
                ?>
        
        </div>
    <?php require 'views/shared/__footer.php' ?>

</body>
</html>

<script type="text/javascript" src="<?php echo constant('URL')?>public/js/util.js">

</script>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portal Administrador</title>
</head>
<body>
    <?php require 'views/shared/__header.php' ?>
    <div class="main container">
        <?php
            if(isset($this->message_exito)) { ?>
                <div class="alert alert-primary" role="alert">
                    <?php echo $this->message_exito ?>
                </div>
            <?php 
            }
            /* por el momento se documenta
            else if(isset($this->message_error)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $this->message_error ?>
                </div>
            <?php 
            }
            */
        ?>
        <center>
            <h1>Gestión de Vigilantes</h1>
            <hr />
        </center>
        <br />
        <button type="button" class="btn addVigilante" data-toggle="modal" data-target="#crearEditarVigilante"><i class="fas fa-user-plus"></i>Crear Vigilante</button>
        <?php require "views/vigilantes/crearVigilanteModal.php"; ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Correo Electrónico</th>
                <th scope="col">Hora Entrada</th>
                <th scope="col">Hora Salida</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($this->listadoVigilantes as $vigilante)
                {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $vigilante["id"]; ?></th>
                        <td><?php echo $vigilante["first_name"]; ?></td>
                        <td><?php echo $vigilante["last_name"]; ?></td>
                        <td><?php echo $vigilante["email"]; ?></td>
                        <td><?php echo $vigilante["entry_time"]; ?></td>
                        <td><?php echo $vigilante["departure_time"]; ?></td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearEditarVigilante"><i class="fas fa-user-edit"></i>Editar</button></td>
                    </tr>
                    <?php
                }
            ?>
            </tbody>
        </table>
        <br><br>
    </div>
    <?php require 'views/shared/__footer.php' ?>
</body>
</html>
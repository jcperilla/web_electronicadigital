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
            if(isset($this->message_error)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $this->message_error ?>
                </div>
            <?php 
            }
            
        ?>
        <center>
            <h1>Gestión de Vigilantes</h1>
            <hr />
        </center>
        <br />
        <button type="button" onclick="clean_form_vigilant()" class="btn addVigilante" data-toggle="modal" data-target="#crearEditarVigilante"><i class="fas fa-user-plus"></i>Crear Vigilante</button>
        <?php require "views/vigilantes/crearVigilanteModal.php"; ?>
        <div class="table-responsive-sm">
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
                        <td class="d-none"><?php  ?></td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearEditarVigilante" onclick='editarVigilante(<?php echo json_encode($vigilante); ?>)'><i class="fas fa-user-edit"></i>Editar</button></td>
                    </tr>
                    <?php
                }
            ?>
            </tbody>
        </table>
        </div>
        <br><br>
    </div>
    <?php require 'views/shared/__footer.php' ?>
</body>
</html>

<script>


function editarVigilante(datosVigilante)
{
    jQuery("#id").val(Number(datosVigilante.id));

    document.getElementById("id").readOnly = true;

    jQuery("#idVigilante").val(datosVigilante.id);
    jQuery("#first_name").val(datosVigilante.first_name);
    jQuery("#last_name").val(datosVigilante.last_name);
    jQuery("#email").val(datosVigilante.email);

    document.getElementById("email").readOnly = true;

    jQuery("#entry_time").val(datosVigilante.entry_time);
    jQuery("#departure_time").val(datosVigilante.departure_time);
    jQuery("#password").val(datosVigilante.password);
}

function clean_form_vigilant(){
    document.getElementById("id").readOnly = false;
    document.getElementById("email").readOnly = false;

    document.getElementById("id").value="";
    document.getElementById("idVigilante").value="";
    document.getElementById("first_name").value="";
    document.getElementById("last_name").value="";
    document.getElementById("email").value="";
    document.getElementById("entry_time").value="";
    document.getElementById("departure_time").value="";
    document.getElementById("password").value="";
}
</script>

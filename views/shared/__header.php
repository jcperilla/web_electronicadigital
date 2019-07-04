<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parqueadero Uniquindio</title>
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css">
    <link rel="icon" href="<?php echo constant('URL')?>public/img/eparking.png">
    <script type="text/javascript" src="<?php echo constant('URL')?>public/bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="<?php echo constant('URL')?>public/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a8e86ecd19.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <a class="navbar-brand" href="#">Parqueadero</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="fa fa-bars"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo constant('URL'); ?>main/consulta">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <?php 
        if(isset(Session::get('user')['id'])) {
          if(Session::get('user')['type_user'] == 1) {
      ?>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo constant('URL'); ?>vigilantes">Gestionar Vigilantes <span class="sr-only">(current)</span></a>
      </li>
      <?php }
        }
      ?>

    </ul>
    <?php 
        if(isset(Session::get('user')['id'])) {
      ?>
      <div class="form-inline my-2 my-lg-0 "> 
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i>
            <?php  echo Session::get('user')['first_name'].' '.Session::get('user')['last_name']?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo constant('URL'); ?>account/destroySession">Cerrar sesion <span class="sr-only">(current)</span></a>
            </div>
          </li>
        </ul>
      </div>
      <?php }
      else { ?>
      <div class="form-inline my-2 my-lg-0 "> 
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo constant('URL'); ?>account">Login <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
      <?php } ?>
  </div>
</nav>
</body>
</html>
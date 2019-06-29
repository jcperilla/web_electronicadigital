<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Pane</title>
</head>
<body>
    <?php require 'views/shared/__header.php' ?>
    <div class="main container">
        <br>
        <h1>Admin Pane </h1>
        <div class="row">
            
                <div class="col-sm-6">
                    <div class="jumbotron">
                        <h2 class="display-4">
                            Agregar
                        </h2>
                        <p style="align:center; font-size:60px"><i class="fa fa-user-check"></i></p>
                        
                        <a class="btn btn-primary btn-lg" href="#" role="button">Agregar</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="jumbotron">
                        <h2 class="display-4">
                            Listar
                        </h2>
                        <p style="align:center; font-size:60px"><i class="fa fa-users"></i></p>
                        
                        <a class="btn btn-primary btn-lg" href="#" role="button">Agregar</a>
                    </div>
                </div>
        </div>
    <?php require 'views/shared/__footer.php' ?>
</body>
</html>
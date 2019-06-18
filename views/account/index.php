<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php require 'views/shared/__header.php' ?>
    <div class="main container">
        <form class="form-login" action="<?php echo constant('URL'); ?>/account/login" method="POST">
            <div class="text-center mb-4">
                <img class="mb-4" src="public/img/logo.png" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Login</h1>
            </div>

            <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" name="email">
                <label for="inputEmail">Email address</label>
            </div>

            <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="password">
                <label for="inputPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form>
    </div>
    <?php require 'views/shared/__footer.php' ?>
</body>
</html>
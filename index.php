<!doctype html>
<html lang="ES">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Proyecto FINBA</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <!-- JavaScript -->
        <script src="js/Comprobaciones.js"></script>
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
        <script src="js/bootstrap.min.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-grid.css" rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <!-- AJAX -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="card">
                <center><h1>Bienvenido a FINBA</h1></center>
            </div>
            <div class="row justify-content-center align-items-center" style="height:100vh">
                <div class="card">
                    <div class="card-body">
                        <center><h2>Inicio de Sesion</h2></center>  
                        <!-- Icon -->
                        <div class="fadeIn first">
                            <center><img src="resources/img/login_ipn.png"/></center> 
                        </div>
                        <form method="post" name="iniciosesion" action="controllers/crtauth.php" metod="post">
                            <p>
                                <input type="text"  id="username" name="username" placeholder="Correo" onkeypress = "validarCorreo()" required="true">
                                <span id="usernameOk"></span>
                            </p>
                            <p>
                                <input type="password" id="password" name="password" placeholder="Contraseña"  onkeypress = "validarContraseña()" required="true">
                                <span id="passOK"></span>
                            </p>
                            <p>
                                <input type="checkbox" onclick="showPassword()"> Mostrar Contraseña
                            </p>
                            <center>
                                <p>
                                    <input type="submit" class="btn-primary" value="Iniciar Sesion">
                                </p>
                            </center> 
                        </form>   
                        <div class="col-2">
                            <center>
                                <input class="btn-primary" type="button" data-toggle='modal' data-target='#resetpass' value='Restablecer contraseña'>
                                <?php include 'views/users/vwresetpassword.php'; ?>
                            </center>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </body>
</html>

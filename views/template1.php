<?php ?>
<!DOCTYPE html>
<html>
    <!-- head -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Proyecto FINBA</title>
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="../css/sidebar.css">
        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <!-- script animacion Sidebar -->
    </head>
    <body>
        <!-- jQuery CDN - Slim version (=without AJAX) -->

        <script>

            $(document).ready(function () {

                $('#sidebar').on('mouseout', function () {
                    $('#sidebar').addClass('active');

                });


                $('#sidebar').on('mouseover', function () {
                    $('#sidebar').removeClass('active');
                });

            });
        </script>
        <div class="wrapper">
            <div>
                <!-- Sidebar  -->
                <nav id="sidebar">
                    <div class="sidebar-header">
                        <h3>FINBA Monitoreo de Servicios</h3>
                        <h3><?php echo $_SESSION['Schoolsname']; ?></h3>
                        <strong>FINBA</strong>
                        <strong><?php echo $_SESSION['Schoolsname']; ?></strong>
                    </div>
                    <ul class="list-unstyled components">
                        <li class="active">
                            <a href="../views/vwmenuprincipal.php">
                                <i class="fas fa-home"></i>
                                Inicio
                            </a>
                        </li>
                        <li class="active"> 
                            <a href="#manageusers" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fas fa-tachometer" ></i>
                                Usuarios
                            </a>
                            <ul class="collapse list-unstyled" id="manageusers">
                                <li>
                                    <a href="../controllers/crtusers.php">Administrar Usuarios</a>
                                </li>
                                <li>
                                    <form action="../controllers/crtauth.php" method="post">
                                        <div hidden="true">
                                            <!-- Variable para cerrar sesion -->
                                            <input class="col-8" type="text" id="closesesion" name="closesesion" value="true">
                                        </div>
                                        <a href="javascript:;" onclick="parentNode.submit();">Cerrar Session</a>
                                        <input type="hidden" name="mess" value= "">
                                    </form>
                                </li>
                                <li>
                                    <form action="../controllers/crtauth.php" method="post">
                                        <div hidden="true">
                                            <!-- Variable para cerrar sesion -->
                                            <input class="col-8" type="text" id="changedpass" name="changedpass" value="true">
                                        </div>
                                        <a href="javascript:;" onclick="parentNode.submit();">Cambiar Contraseña</a>
                                        <input type="hidden" name="mess" value= "">
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li class="active">
                            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fas fa-tachometer"></i>
                                Inventario
                            </a>
                            <ul class="collapse list-unstyled" id="homeSubmenu">
                                <li>
                                    <form action="../controllers/crtinventory.php" method="post">
                                        <div hidden="true">
                                            <!-- Variable para cerrar sesion -->
                                            <input class="col-8" type="text" id="searchinventory" name="searchinventory" value="true">
                                        </div>
                                        <a href="javascript:;" onclick="parentNode.submit();">Administrar Inventario</a>
                                        <input type="hidden" name="mess" value= "">
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <form action="../controllers/crtsolarpanels.php" method="post">
                                <div hidden="true">
                                    <!-- Variable para cerrar sesion -->
                                    <input class="col-8" type="text" id="searchpanels" name="searchpanels" value="true">
                                </div>
                                <a href="javascript:;" onclick="parentNode.submit();">Paneles Solares</a>
                                <input type="hidden" name="mess" value= "">
                            </form> 
                        </li>
                        <li>
                            <a href="../controllers/crtadddvc.php">
                                <i class="fas fa-briefcase"></i>
                                Dispositivos
                            </a> </li>
                        <li>
                            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fas fa-copy"></i>
                                Pages
                            </a>

                            <ul class="collapse list-unstyled" id="pageSubmenu">
                                <li>
                                    <a href="#">Page 1</a>
                                </li>
                                <li>
                                    <a href="#">Page 2</a>
                                </li>
                                <li>
                                    <a href="#">Page 3</a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </nav>
            </div>




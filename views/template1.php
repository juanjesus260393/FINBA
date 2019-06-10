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
            <div class="ps">
                <!-- Sidebar  -->
                <nav id="sidebar">
                    <div class="sidebar-header">
                        <?php   
                        $imagen_panel =  $_SESSION['idimg_user'];
                        echo ('<img src="../resources/img/logotipos/' . $imagen_panel . '" width="50" height="50">');
                        ?>
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
                            <?php 
                            if($_SESSION['type_user'] == 'administrator'){
                               include('../views/users/vwincludemanageusers.php');
                            }else{
                            }
                            ?>
                        </li>
                            <li>
                            <form action="../controllers/crtinventory.php" method="post">
                                <div hidden="true">
                                    <!-- Variable para cerrar sesion -->
                                    <input class="col-8" type="text" id="searchinventory" name="searchinventory" value="true">
                                </div>
                                <a href="javascript:;" onclick="parentNode.submit();"><i class="fas fas fa-clipboard-list"></i>Inventario</a>
                                <input type="hidden" name="mess" value= "">
                            </form> 
                        </li>
                        <li>
                            <form action="../controllers/crtsolarpanels.php" method="post">
                                <div hidden="true">
                                    <!-- Variable para cerrar sesion -->
                                    <input class="col-8" type="text" id="searchpanels" name="searchpanels" value="true">
                                </div>
                                <a href="javascript:;" onclick="parentNode.submit();"><i class="fas fa-sun"></i>Sistema Fotovoltaico</a>
                                <input type="hidden" name="mess" value= "">
                            </form> 
                        </li>
                        <li>
                            <a href="../controllers/crtadddvc.php">
                                <i class="fas fa-code-branch"></i>
                                STM
                            </a> </li>
                            <li>
                                <a href="#graficas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fas fa-chart-bar"></i>
                                Monitoreo
                            </a> 
                                <ul class="collapse list-unstyled" id="graficas">
                                <li>
                                   <a href="../controllers/crtmonitoreo.php">
                                <i class="fas fa-chart-bar"></i>
                                Tablero General
                            </a> 
                                </li>
                                <li>
                                         <a href="">
                                <i class="fas fa-chart-bar"></i>
                                UPS1
                            </a> 
                                </li>
                            </ul>
                            
                            </li>
                        
                        <li>
                            <a href="#" >
                                <i class="fas fa-code-branch"></i>
                                Dispositivos SEEDS
                            </a>
                        </li>
                        <li>
                            <a href="#config" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fas fa-cog"></i>
                                Ajustes
                            </a>
                            <ul class="collapse list-unstyled" id="config">
                                <li>
                                    <form action="../controllers/crtauth.php" method="post">
                                        <div hidden="true">
                                            <!-- Variable para cerrar sesion -->
                                            <input class="col-8" type="text" id="closesesion" name="closesesion" value="true">
                                        </div>
                                        <a href="javascript:;" onclick="parentNode.submit();">Cerrar Sesion</a>
                                        <input type="hidden" name="mess" value= "">
                                    </form>
                                </li>
                                <li>
                                    <form action="../controllers/crtauth.php" method="post">
                                        <div hidden="true">
                                            <!-- Variable para cerrar sesion -->
                                            <input class="col-8" type="text" id="changedpass" name="changedpass" value="true">
                                        </div>
                                        <a href="javascript:;" onclick="parentNode.submit();">Modificar Perfil</a>
                                        <input type="hidden" name="mess" value= "">
                                    </form>

                                </li>
                            </ul>
                        </li>
                    </ul>

                </nav>
            </div>




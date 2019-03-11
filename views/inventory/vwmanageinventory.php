<div hidden="true">
    <?php
    session_start();
    require_once("C:/xampp/htdocs/finbaproject/FINBA/models/mdlsecurity.php");
    mdlsecurity::validateToken();
    ?>
</div>
<!DOCTYPE html>
<html>
    <!-- head -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Administracion del Inventario</title>
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="../css/sidebar.css">
        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <!-- script animacion Sidebar -->
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
                        <strong>FINBA</strong>
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
                                Servicios
                            </a>
                            <ul class="collapse list-unstyled" id="homeSubmenu">
                                <li>
                                    <a href="#"><i class="fas fa-tint"></i>Agua</a>
                                </li>
                                <li>
                                    <a href="#">Home 2</a>
                                </li>
                                <li>
                                    <a href="#">Home 3</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-briefcase"></i>
                                About
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
            <div class="container">
                <center><h2></h2></center>   
                <center> <table class="table">
                        <thead>
                            <tr>
                                <th>Username(correo)</th>
                                <th>Tipo de Usuario</th>
                                <th>Eliminar Usuario</th>
                                <th>Editar Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $listofusers;
                            if (empty($listofusers)) {
                                $voidarray = array();
                                $listofusers = $voidarray;
                            }
                            for ($i = 0; $i < count($listofusers); $i++) {
                                ?>
                                <tr  class='btn-outline-primary'>
                                    <td><?php echo $listofusers[$i]["username"]; ?></td>
                                    <?php
                                    if ($listofusers[$i]["type_user"] == 'Administrator') {
                                        printf("<td height='80'  style='color: #EA1515 ;'><h5><b>Administrador</b></h5></td>");
                                    } else if ($listofusers[$i]["type_user"] == 'Employee') {
                                        printf("<td height='80'  style='color: blue ;'><h5><b>Empleado</b></h5></td>");
                                    }
                                    ?>
                                    <td> 
                                        <?php
                                        $usernamedelete = $listofusers[$i]["username"];
                                        $delete = '1';
                                        $onydelete = '1';
                                        echo '<a href="../controllers/crtusers.php?username=' . $usernamedelete . '&delete=' . $delete . '&onlydelete =' . $onydelete . '" '
                                        . 'onclick="if (!confirm(\'Estas seguro que quieres eliminar este usuario?\')) '
                                        . '{ return false}"><img src="../resources/img/eliminar.jpg"></a>'
                                        ?></td>
                                    <td><form method="post" action="../controllers/crtusers.php">
                                            <?php
                                            $usernameupdate = $listofusers[$i]["username"];
                                            $typeuserupdate = $listofusers[$i]["type_user"];
                                            if ($typeuserupdate == 'Administrator') {
                                                $typeuserupdate = 'Administrador';
                                            }
                                            if ($typeuserupdate == 'Employee') {
                                                $typeuserupdate = 'Empleado';
                                            }
                                            $update = '1';
                                            echo "<input type='hidden' id='usernameupdate' name='usernameupdate' value='$usernameupdate'> "
                                            . "<input type='hidden' id='update' name='update' value='$update'> "
                                            . "<input type='hidden' id='typeuserupdate' name='typeuserupdate' value='$typeuserupdate'>"
                                            . "<input type='submit' value='Actualizar'>"
                                            ?>
                                        </form></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table></center>
                <center>
                    <form method="post" action="../controllers/crtusers.php" name="form1" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="container">
                                <center>
                                    <div hidden="true">
                                        <!-- value insert -->
                                        <input class="col-8" type="text" id="insert" name="insert"  value="true">
                                    </div>
                                </center>
                            </div>
                        </div>
                        <center><div class="modal-footer">
                                <input type="submit" class="btn btn-primary"value="Registrar Usuario" >
                            </div></center>
                    </form>
                </center> 
            </div>  
            <!-- Page Content  -->
            <div id="content">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                </nav>
            </div>
        </div>
        <div>
        </div>
    </body>

</html>
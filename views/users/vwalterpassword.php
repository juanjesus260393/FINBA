<div hidden="true">
    <?php
    session_start();
    require_once("../models/mdlsecurity.php");
    mdlsecurity::validateToken();
    ?>
</div>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap-grid.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/Comprobaciones.js"></script>
        <title>Modificar Perfil</title>
    </head>
    <script>
        $(document).ready(function () {
            $('#adcuponmodal').modal("show");
            $('#adcuponmodal').on('hidden.bs.modal', function () {
                document.location.href = '../views/vwmenuprincipal.php';
            });
        });

    </script>
    <div class="modal" id="adcuponmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="post" action="../controllers/crtauth.php" name="form1" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel" style="text-align: center;">Modificar Perfil</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <center>
                                <div hidden="true">
                                    <!-- changed passwword -->
                                    <input class="col-8" type="valueforpassword" id="valueforpassword" name="valueforpassword"  value="valueforpassword">
                                </div>
                                <div>
                                    <!-- Contraseña -->
                                    <label class="col-3"style="background-color:#f1f1f1;">Contraseña:</label>
                                    <input class="col-8" type="password" id="newpassword" name="newpassword" onkeypress = "validarContraseña()">
                                    <span id="passOK"></span>
                                    <p>
                                        <input type="checkbox" onclick="showPasswordupdate()"> Mostrar Contraseña
                                    </p>
                                </div>
                                <div hidden="true">
                                    <!-- contraseña previa escondida-->
                                    <input class="col-8" type="ext" id="passprevious" name="passprevious" value="<?php echo $passsearch ;
    ?>">
                                </div>
                                <div>
                                    <!-- nombre actual -->
                                    <label class="col-3"style="background-color:#f1f1f1;">Nombre actual:</label>
                                    <input class="col-8" type="ext" id="name" name="name" value="<?php echo $_SESSION['name'];
    ?>" disabled="true">
                                </div>
                                <div hidden="true">
                                    <!-- nombre actual escondido-->
                                    <input class="col-8" type="ext" id="nameprevious" name="nameprevious" value="<?php echo $_SESSION['name'];
    ?>">
                                </div>
                                <div>
                                    <!-- nuevo nombre -->
                                    <label class="col-3"style="background-color:#f1f1f1;">Nuevo Nombre:</label>
                                    <input class="col-8" type="ext" id="newname" name="newname" >
                                </div>
                                <div>
                                    <!-- apellido paterno actual -->
                                    <label class="col-3"style="background-color:#f1f1f1;">Apellido paterno actual:</label>
                                    <input class="col-8" type="text" id="firstname" name="firstname" value="<?php echo $_SESSION['first_name'];
    ?>" disabled="true">
                                </div>
                                <div hidden="true">
                                    <!-- apellido paterno actual escondido -->
                                    <input class="col-8" type="text" id="firstnameprevious" name="firstnameprevious" value="<?php echo $_SESSION['first_name'];
    ?>">
                                </div>
                                <div>
                                    <!-- nuevo apellido paterno-->
                                    <label class="col-3"style="background-color:#f1f1f1;">Nuevo Apellido paterno:</label>
                                    <input class="col-8" type="ext" id="newfirstname" name="newfirstname" >
                                </div>
                                <div>
                                    <!-- apellido materno actual -->
                                    <label class="col-3"style="background-color:#f1f1f1;">Apellido Materno actual:</label>
                                    <input class="col-8" type="text" id="secondname" name="secondname" value="<?php echo $_SESSION['second_name'];
    ?>" disabled="true">
                                </div>
                                <div hidden="true">
                                    <!-- apellido materno actual escondido-->
                                    <input class="col-8" type="text" id="secondnameprevious" name="secondnameprevious" value="<?php echo $_SESSION['second_name'];
    ?>">
                                </div>
                                <div>
                                    <!-- nuevo apellido materno -->
                                    <label class="col-3"style="background-color:#f1f1f1;">Nuevo Apellido Materno:</label>
                                    <input class="col-8" type="ext" id="newsecondname" name="newsecondname" >
                                </div>
                                <div>
                                    <!-- puesto actual-->
                                    <label class="col-3"style="background-color:#f1f1f1;">Puesto actual:</label>
                                    <input class="col-8" type="text" id="work_position" name="work_position" value="<?php echo $_SESSION['work_position'];
    ?>" disabled="true">
                                </div>
                                <div hidden="true">
                                    <!-- puesto actual escondido-->
                                    <input class="col-8" type="text" id="workpositionprevious" name="workpositionprevious" value="<?php echo $_SESSION['work_position'];
    ?>">
                                </div>
                                <div>
                                    <!-- Puesto del usuario -->
                                    <span><label class="col-3" style="background-color:#f1f1f1;">Nuevo Puesto</label></span>
                                    <select class="col-8" name="workpositionnew" id="workpositionnew">
                                        <option></option>
                                        <option>Jefe de Departamento</option>
                                        <option>Encargado de Departamento</option>
                                    </select>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                        <!-- En el boton registrar se encuentra una alerta para validar que efectivamente se quiere registrar el cupon-->
                        <input type="submit" class="btn btn-primary"
                               onclick="if (!confirm('Estas seguro que quieres actualizar tu perfil?')) {
                                           return false;
                                       }" value="Actualizar perfil" >
                    </div>
                </form>
            </div>
        </div>
    </div>            
</html>

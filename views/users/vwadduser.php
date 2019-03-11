<?php
session_start();
require_once("C:/xampp/htdocs/finbaproject/FINBA/models/mdlsecurity.php");
mdlsecurity::validateToken();
?>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../css/bootstrap.css" rel="stylesheet">
        <link href="../../css/bootstrap-grid.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Comprobaciones.js"></script>
        <title>Agregar Usuario</title>
    </head>
    <script>
        $(document).ready(function () {
            $('#adcuponmodal').modal("show");
            $('#adcuponmodal').on('hidden.bs.modal', function () {
                document.location.href = '../../controllers/crtusers.php';
            });
        });

    </script>
    <div class="modal" id="adcuponmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="post" action="../../controllers/crtusers.php" name="form1" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel" style="text-align: center;">Agregar Usuario</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <center>
                                <div>
                                    <!-- nombre de usuario -->
                                    <span><label class="col-3" style="background-color:#f1f1f1;">Username(correo eletronico):</label></span>
                                    <input class="col-8" type="text" id="username" name="username"  onkeypress = "validarCorreo()" placeholder="nombre de usuario" maxlength="99" required = "true"></span>
                                    <span id="usernameOk"></span>
                                </div>
                                <div>
                                    <!-- Contraseña -->
                                    <label class="col-3"style="background-color:#f1f1f1;">Contraseña:</label>
                                    <input class="col-8" type="password" id="password" name="password" onkeypress = "validarContraseña()" required = "true">
                                    <span id="passOK"></span>
                                    <p>
                                        <input type="checkbox" onclick="showPassword()"> Mostrar Contraseña
                                    </p>
                                </div>
                                <div>
                                    <!-- Tipo de Usuario -->
                                    <label class="col-3"style="background-color:#f1f1f1;">Tipo de Usuario:</label>
                                    <fieldset id="type_user">
                                        <p><input type="radio" name="type_user" value="administrator" required="true"> Administrador</p>
                                        <p><input type="radio" name="type_user" value="employee"> Empleado</p>
                                    </fieldset>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                        <!-- En el boton registrar se encuentra una alerta para validar que efectivamente se quiere registrar el cupon-->
                        <input type="submit" class="btn btn-primary"
                               onclick="if (!confirm('Estas seguro que quieres registrar a este usuario?')) {
                                           return false;
                                       }" value="Registrar Usuario" >
                    </div>
                </form>
            </div>
        </div>
    </div>            
</html>
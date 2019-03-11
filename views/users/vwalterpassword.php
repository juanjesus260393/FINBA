<div hidden="true">
    <?php
    session_start();
    require_once("C:/xampp/htdocs/finbaproject/FINBA/models/mdlsecurity.php");
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
        <title>Cambiar contraseña</title>
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
                        <h3 class="modal-title" id="exampleModalLabel" style="text-align: center;">Cambiar Contraseña</h3>
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
                                    <input class="col-8" type="password" id="newpassword" name="newpassword" onkeypress = "validarContraseña()" required = "true">
                                    <span id="passOK"></span>
                                    <p>
                                        <input type="checkbox" onclick="showPasswordupdate()"> Mostrar Contraseña
                                    </p>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                        <!-- En el boton registrar se encuentra una alerta para validar que efectivamente se quiere registrar el cupon-->
                        <input type="submit" class="btn btn-primary"
                               onclick="if (!confirm('Estas seguro que quieres cambiar tu contraseña?')) {
                                           return false;
                                       }" value="Cambiar Contraseña" >
                    </div>
                </form>
            </div>
        </div>
    </div>            
</html>

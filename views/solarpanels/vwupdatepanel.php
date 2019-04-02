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
        <title>Actualizar Panel Solar</title>
    </head>
    <script>
        $(document).ready(function () {
            $('#adcuponmodal').modal("show");
            $('#adcuponmodal').on('hidden.bs.modal', function () {
                document.location.href = '../controllers/crtsolarpanels.php';
            });
        });

    </script>
    <div class="modal" id="adcuponmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="post" action="../controllers/crtsolarpanels.php" name="form1" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel" style="text-align: center;">Actualizar Panel Solar</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <center>
                                <div hidden="true">
                                    <!-- Identificador del inventario -->
                                    <input class="col-8" type="text" id="updateidpanel" name="updateidpanel" value="<?php echo $id_solar_panel_update;
    ?>">
                                </div>
                                <div hidden="true">
                                    <!-- Identificador Nomeclatura -->
                                    <input class="col-8" type="text" id="updatenomenclature" name="updatenomenclature" value="<?php echo $id_nomenclatureupdate;
    ?>">
                                </div>
                                <div hidden="true">
                                    <!-- Identificador Nomeclatura -->
                                    <input class="col-8" type="text" id="enabledpreviouspost" name="enabledpreviouspost" value="<?php echo $enabledupdate;
    ?>">
                                </div>
                                <div hidden="true">
                                    <!-- Identificador Nomeclatura -->
                                    <input class="col-8" type="text" id="referencepreviouspost" name="referencepreviouspost" value="<?php echo $referenceupdate;
    ?>">
                                </div>
                                <div>
                                    <!-- Estado Previo -->
                                    <span><label class="col-3" style="background-color:#f1f1f1;">Estado Previo:</label></span>
                                    <?php
                                    if ($enabledupdate) {
                                        $statusupdate = 'Habilitado';
                                    } else {
                                        $statusupdate = 'Deshabilitado';
                                    }
                                    ?>
                                    <input class="col-8" type="text" id="enabledprevious" name="enabledprevious" value="<?php echo $statusupdate;
                                    ?>" disabled="true">
                                </div>
                                <div>
                                    <!-- Estado nuevo-->
                                    <label class="col-3"style="background-color:#f1f1f1;">Nuevo Estado:</label>
                                    <select class="col-8" name="newenable" id="newenable" >
                                        <option></option>
                                        <option>Habilitado</option>
                                        <option>Deshabilitado</option>
                                    </select>
                                </div>

                                <div>
                                    <!-- Referencia previa -->
                                    <span><label class="col-3" style="background-color:#f1f1f1;">Referencia Previa:</label></span>
                                    <textarea class="col-8" name="referenceprevious" id="referenceprevious" rows="5" minlength="1" maxlength="499" disabled="true"> <?php echo $referenceupdate; ?></textarea>
                                </div>
                                <div>
                                    <!-- Referencia nueva -->
                                    <label class="col-3"style="background-color:#f1f1f1;">Referencia:</label>
                                    <textarea class="col-8" name="newreference" id="newreference" rows="5" minlength="1" maxlength="499"></textarea>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                        <!-- En el boton registrar se encuentra una alerta para validar que efectivamente se quiere registrar el cupon-->
                        <input type="submit" class="btn btn-primary"
                               onclick="if (!confirm('Estas seguro que quieres actualizar el panel?')) {
                                           return false;
                                       }" value="Actualizar Panel" >
                    </div>
                </form>
            </div>
        </div>
    </div>            
</html>

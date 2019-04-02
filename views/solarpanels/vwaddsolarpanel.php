<?php
session_start();
require_once("C:/xampp/htdocs/finbaproject/FINBA/models/mdlsecurity.php");
mdlsecurity::validateToken();
?>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap-grid.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/Comprobaciones.js"></script>
        <title>Agregar Panel Solar</title>
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
                        <h3 class="modal-title" id="exampleModalLabel" style="text-align: center;">Agregar Panel Solar</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <center>
                                <div>
                                    <!-- Nombre del elemento -->
                                    <label class="col-3"style="background-color:#f1f1f1;">Nombre del Panel Solar:</label>
                                    <input class="col-8" type="text" id="panelname"  name="panelname"  onkeypress="nombreblanco()" required = "true">
                                    <span id="elementOk"></span> 
                                </div>
                                <div hidden="true">
                                    <!-- Escuela-->
                                    <label class="col-3"style="background-color:#f1f1f1;">Edificio(escuela):</label>
                                    <input class="col-8" type="text" id="school"  name="school"  value= "<?php echo $_SESSION['Schoolsname'];
?>" required = "true">
                                </div> 
                                <div>
                                    <!-- n° de Edificio -->
                                    <label class="col-3"style="background-color:#f1f1f1;">N° de Edificio:</label>
                                    <select class="col-8" name="building_number" id="building_number" required="true">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div>
                                    <!-- Nivel -->
                                    <label class="col-3"style="background-color:#f1f1f1;">Nivel:</label>
                                    <select class="col-8" name="level" id="level" required="true">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div>
                                    <!-- Orientacion -->
                                    <label class="col-3"style="background-color:#f1f1f1;">Orientacion:</label>
                                    <select class="col-8" name="orientation" id="orientation" required="true">
                                        <option>NORTE</option>
                                        <option>SUR</option>
                                        <option>ESTE</option>
                                        <option>OESTE</option>
                                    </select>
                                </div>
                                <div>
                                    <!-- Locacion -->
                                    <label class="col-3"style="background-color:#f1f1f1;">Locacion (interior/exterior):</label>
                                    <select class="col-8" name="location" id="location" required="true">
                                        <option>INTERIOR</option>
                                        <option>EXTERIOR</option>
                                    </select>
                                </div>
                                <div>
                                    <!-- Referencia -->
                                    <label class="col-3"style="background-color:#f1f1f1;">Referencia:</label>
                                    <textarea class="col-8" name="reference" id="reference" rows="5" minlength="1" maxlength="499" required="true"></textarea>
                                </div>
                                <div>
                                    <!-- Imagen relacionada al panel solar -->
                                    <label class="col-3" style="background-color:#f1f1f1;">Imagen del Panel:</label>
                                    <input class="col-8" type="file" name="id_image_panel"  id="id_image_panel" accept=".jpg">
                                </div>
                                <div>
                                    <!-- Referencia -->
                                    <label class="col-3"style="background-color:#f1f1f1;">N° de salon o ubicacion:</label>
                                    <input class="col-8" type="text" id="registry_number"  name="registry_number" onkeypress=" return soloNumeros(event)" maxlength="14" required = "true">
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                        <!-- En el boton registrar se encuentra una alerta para validar que efectivamente se quiere registrar el cupon-->
                        <input type="submit" class="btn btn-primary"
                               onclick="if (!confirm('Estas seguro que quieres registrar este panel?')) {
                                           return false;
                                       }" value="Registrar Panel" >
                    </div>
                </form>
            </div>
        </div>
    </div>            
</html>


<?php
session_start();
require_once("../models/mdlsecurity.php");
mdlsecurity::validateToken();
?>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../js/Comprobaciones.js"></script>
        <title>Agregar Panel Solar</title>
    </head>
    <div>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <center><h1>Agregar Panel Solar</h1></center>
                <form method="post" action="../controllers/crtsolarpanels.php" name="form1" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="container">
                            <center>
                                <div>
                                    <!-- Nombre del elemento -->
                                    <label class="col-3"style="background-color:#f1f1f1;">Nombre del Panel Solar:</label>
                                    <input class="col-8" type="text" id="panelname"  name="panelname"  onkeypress="nombreblanco()" required = "true">
                                    <span id="elementOk"></span> 
                                </div>
                                <div>
                                    <!-- Numero de Panel-->
                                    <label class="col-3"style="background-color:#f1f1f1;">Numero de Panel:</label>
                                    <input class="col-8" type="text" id="number_panel"  name="number_panel" required = "true">
                                </div> 
                                <div>
                                    <!-- Numero de Investor-->
                                    <label class="col-3"style="background-color:#f1f1f1;">Numero de Investor:</label>
                                    <input class="col-8" type="text" id="number_investorp"  name="number_investorp" required = "true">
                                </div>
                                <div>
                                    <!-- Fila -->
                                    <label class="col-3"style="background-color:#f1f1f1;">Fila:</label>
                                    <input class="col-8" type="number" id="row"  name="row" required = "true">
                                </div>
                                <div>
                                    <!-- Imagen relacionada al panel solar -->
                                    <label class="col-3" style="background-color:#f1f1f1;">Imagen del Panel:</label>
                                    <input class="col-8" type="file" name="id_image_panel"  id="id_image_panel" accept=".jpg">
                                </div>
                                <div hidden="true">
                                    <input class="col-8" type="text" name="insert_panel"  id="insert_panel" value="true">
                                </div>
                                <div hidden="true">
                                    <!-- Escuela-->
                                    <label class="col-3"style="background-color:#f1f1f1;">Edificio(escuela):</label>
                                    <input class="col-8" type="text" id="school_investor"  name="school_investor"  value= "<?php echo $_SESSION['Schoolsname'];
?>" required = "true">
                                </div>
                                <div>
                                    <?php
                                    if ($_SESSION['Schoolsname'] == 'CIC') {
                                        include('../views/solarpanels/investor/btnlocationpanel.php');
                                    }
                                    ?> 
                                </div>
                                <div>
                                    <?php
                                    if ($_SESSION['Schoolsname'] == 'ESCOM') {
                                        include('../views/solarpanels/investor/tbbuildnumberp.php');
                                    }
                                    ?> 
                                </div>
                            </center>
                            <center><input type="submit" class="btn btn-primary"
                                           onclick="if (!confirm('Estas seguro que quieres registrar este Panel?')) {
                                                       return false;
                                                   }" value="Registrar Panel" > </center>  
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>            
</html>
<?php
require_once('../views/solarpanels/investor/vwlocationpanel.php');
require_once('../views/solarpanels/investor/vwlocationescomp.php');

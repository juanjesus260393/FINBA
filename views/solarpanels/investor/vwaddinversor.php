<?php
session_start();
require_once("C:/xampp/htdocs/finbaproject/FINBA/models/mdlsecurity.php");
mdlsecurity::validateToken();
?>
<html lang="es">
    <script src="../js/Comprobaciones.js"></script>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <center><h1>Agregar Inversor</h1></center>
            <form method="post" action="../controllers/crtsolarpanels.php" name="form1" enctype="multipart/form-data">
                <div>
                    <div >
                        <center>
                            <div>
                                <!-- Numero del Investor -->
                                <label class="col-3"style="background-color:#f1f1f1;">Numero del Investor:</label>
                                <input class="col-8" type="number" id="number_investor"  name="number_investor"  onkeypress="nombreblanco()" required = "true">
                                <span id="elementOk"></span> 
                            </div>
                            <div>
                                <!-- Nombre del investor -->
                                <label class="col-3"style="background-color:#f1f1f1;">Nombre de Investor:</label>
                                <input class="col-8" type="text" id="name_investor"  name="name_investor"  onkeypress="nombreblanco()" required = "true">
                                <span id="elementOk"></span> 
                            </div>
                            <div hidden="true">
                                <!-- Escuela-->
                                <label class="col-3"style="background-color:#f1f1f1;">Edificio(escuela):</label>
                                <input class="col-8" type="text" id="school_investor"  name="school_investor"  value= "<?php echo $_SESSION['Schoolsname'];
?>" required = "true">
                            </div>
                            <div>
                                <!-- Imagen relacionada al panel solar -->
                                <label class="col-3" style="background-color:#f1f1f1;">Imagen del Investor:</label>
                                <input class="col-8" type="file" name="id_img_investor"  id="id_img_investor" accept=".jpg">
                            </div>
                            <div hidden="true">
                                <input class="col-8" type="text" name="insert_investor"  id="insert_investor" value="true">
                            </div>
                            <div>
                                <?php
                                if ($_SESSION['Schoolsname'] == 'CIC') {
                                    include('../views/solarpanels/investor/btnlocation.php');
                                }
                                ?> 
                            </div>
                            <div>
                                <?php
                                if ($_SESSION['Schoolsname'] == 'ESCOM') {
                                    include('../views/solarpanels/investor/tbbuildnumber.php');
                                }
                                ?> 
                            </div>
                        </center>
                    </div>
                    <center><input type="submit" class="btn btn-primary"
                                   onclick="if (!confirm('Estas seguro que quieres registrar este Inversor?')) {
                                               return false;
                                           }" value="Registrar Inversor" > </center>     
                </div>
            </form>
        </div> 
    </div>
</html>
<?php
require_once('../views/solarpanels/investor/vwlocation.php');
require_once('../views/solarpanels/investor/vwlocationescom.php');

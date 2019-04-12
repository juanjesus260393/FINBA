<?php
session_start();
require_once("C:/xampp/htdocs/finbaproject/FINBA/models/mdlsecurity.php");
mdlsecurity::validateToken();
?>
<html lang="es">
    <head>
        <script src="../../js/Comprobaciones.js"></script>
        <title>Agregar Al Inventario</title>
    </head>
    <div class="modal-content">
        <form method="post" action="../controllers/crtinventory.php" name="form1" enctype="multipart/form-data">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel" style="text-align: center;">Agregar al Inventario</h3>
            </div>
            <div class="container">
                <center>
                    <div>
                        <!-- Nombre del elemento -->
                        <label class="col-3"style="background-color:#f1f1f1;">Producto:</label>
                        <input class="col-8" type="text" id="elementname"  name="elementname"  onkeypress="nombreblanco()" required = "true">
                        <span id="elementOk"></span> 
                    </div>
                    <div>
                        <!-- cantidad del inventario -->
                        <span><label class="col-3" style="background-color:#f1f1f1;">Cantidad:</label></span>
                        <input class="col-8" type="text" id="quantity" name="quantity"  onkeypress=" return soloNumeros(event)" maxlength="6" required = "true"></span>
                    </div> 
                    <div>
                        <!-- Imagen relacionada al usuario -->
                        <label class="col-3" style="background-color:#f1f1f1;">Imagen:</label>
                        <input class="col-8" type="file" name="img_inventory"  id="img_inventory" accept=".jpg" required="true">
                    </div>
                    <div hidden="true">
                        <!-- Escuela-->
                        <label class="col-3"style="background-color:#f1f1f1;">Edificio(escuela):</label>
                        <input class="col-8" type="text" id="school"  name="school"  value= "<?php echo $_SESSION['Schoolsname'];
?>" required = "true">
                    </div> 
                    <div>
                        <!-- N° de edificio en caso de que la escuela sea escom-->
                        <?php
                        if ($_SESSION['Schoolsname'] == 'ESCOM') {
                            include('../views/inventory/vwnumerodeedificion.php');
                        }
                        ?>
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
                        <!-- Referencia -->
                        <label class="col-3"style="background-color:#f1f1f1;">N° de salon o ubicacion:</label>
                        <input class="col-8" type="text" id="registry_number"  name="registry_number" onkeypress=" return soloNumeros(event)" maxlength="14" required = "true">
                    </div>
                </center>
            </div>
            <center><input type="submit" class="btn btn-primary"
                           onclick="if (!confirm('Estas seguro que quieres registrar este elemento?')) {
                                       return false;
                                   }" value="Registrar" ></center>  
        </form>
    </div>       
</html>
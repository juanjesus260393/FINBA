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
                    <div>
                        <button type="button" class='btn btn-success'  data-toggle='modal' id='idcup' data-target='#exampleModal'>Ubicación</button>
                        <br><br>
                    </div>
                    <div>
                        <label class="col-3"style="background-color:#f1f1f1;">Escuela:</label>
                        <input class="col-8" type="text" id="school" name="school" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/>
                        <label class="col-3"style="background-color:#f1f1f1;">N° de Edificio:</label>
                        <input class="col-8" type="text" id="building_number" name="building_number" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/>
                        <label class="col-3"style="background-color:#f1f1f1;">Nivel:</label>
                        <input class="col-8" type="text" id="level" name="level"readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/>
                        <label class="col-3"style="background-color:#f1f1f1;">Orientacion:</label>
                        <input class="col-8" type="text" id="orientation" name="orientation" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/>
                        <label class="col-3"style="background-color:#f1f1f1;">Locacion I/E:</label>
                        <input class="col-8" type="text" id="location" name="location" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/>
                        <label class="col-3"style="background-color:#f1f1f1;">Referencia:</label>
                        <input class="col-8" type="text" id="reference" name="reference" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/>
                        <label class="col-3"style="background-color:#f1f1f1;">N° de Ubicacion:</label>
                        <input class="col-8" type="text" id="registry_number" name="registry_number" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/>

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
<?php
require('../views/inventory/vwlocation.php');
include('../views/template2.php');

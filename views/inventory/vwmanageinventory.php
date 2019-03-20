<?php
include('../views/template1.php');
?>
<div hidden="true">
    <?php
    session_start();
    require_once("C:/xampp/htdocs/finbaproject/FINBA/models/mdlsecurity.php");
    mdlsecurity::validateToken();
    ?>
</div>

<div class="container">
    <center><h2>Inventario</h2></center>   
    <center> <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Escuela</th>
                    <th>Referencia</th>
                    <th>Estado</th>
                    <th>Eliminar</th>
                    <th>Modificar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $listofinventario;
                if (empty($listofinventario)) {
                    $voidarray = array();
                    $listofinventario = $voidarray;
                }
                for ($i = 0; $i < count($listofinventario); $i++) {
                    ?>
                    <tr  class='btn-outline-primary'>
                        <td><?php echo $listofinventario[$i]["spender_name"]; ?></td>
                        <td><?php echo $listofinventario[$i]["quantity"]; ?></td>
                        <td><?php echo $listofinventario[$i]["school"]; ?></td>
                        <td><?php echo $listofinventario[$i]["reference"]; ?></td>
                        <?php
                        if ($listofinventario[$i]["enabled"] == '0') {
                            printf("<td height='80'  style='color: #EA1515 ;'><h5><b>Deshabilitado</b></h5></td>");
                        } else if ($listofinventario[$i]["enabled"] == '1') {
                            printf("<td height='80'  style='color: blue ;'><h5><b>Habilitado</b></h5></td>");
                        }
                        ?>
                        <td> 
                            <?php
                            $id_inventory = $listofinventario[$i]["id_inventory"];
                            $id_spenders = $listofinventario[$i]["id_spenders"];
                            $id_nomenclature = $listofinventario[$i]["id_nomenclature"];
                            $status = $listofinventario[$i]["enabled"];
                            $cantidad = $listofinventario[$i]["quantity"];
                            $delete = TRUE;
                            echo '<a href="../controllers/crtinventory.php?id_inventorydelete=' . $id_inventory . '&id_spendersdelete=' . $id_spenders . '&id_nomenclaturedelete=' . $id_nomenclature . '&status=' . $status . '&cantidad=' . $cantidad . '&delete=' . $delete . '"'
                            . 'onclick="if (!confirm(\'Estas seguro que quieres eliminar este elemento?\')) '
                            . '{ return false}"><img src="../resources/img/eliminar.jpg"></a>'
                            ?></td>
                        <td><form method="post" action="../controllers/crtinventory.php">
                                <?php
                                $id_inventoryupdate = $listofinventario[$i]["id_inventory"];
                                $id_spendersupdate = $listofinventario[$i]["id_spenders"];
                                $id_nomenclatureupdate = $listofinventario[$i]["id_nomenclature"];
                                $quantityupdate = $listofinventario[$i]["quantity"];
                                $enabledupdate = $listofinventario[$i]["enabled"];
                                $referenceupdate = $listofinventario[$i]["reference"];
                                $updateinventory = TRUE;
                                echo "<input type='hidden' id='id_inventoryupdate' name='id_inventoryupdate' value='$id_inventoryupdate'> "
                                . "<input type='hidden' id='updateinventory' name='updateinventory' value='$updateinventory'> "
                                . "<input type='hidden' id='id_spendersupdate' name='id_spendersupdate' value='$id_spendersupdate'>"
                                . "<input type='hidden' id='id_nomenclatureupdate' name='id_nomenclatureupdate' value='$id_nomenclatureupdate'>"
                                . "<input type='hidden' id='quantityupdate' name='quantityupdate' value='$quantityupdate'>"
                                . "<input type='hidden' id='enabledupdate' name='enabledupdate' value='$enabledupdate'>"
                                . "<input type='hidden' id='referenceupdate' name='referenceupdate' value='$referenceupdate'>"
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
        <form method="post" action="../controllers/crtinventory.php" name="form1" enctype="multipart/form-data">
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
                    <input type="submit" class="btn btn-primary"value="Registrar Elemento" >
                </div></center>
        </form>
    </center> 
</div>  

<?php
include('../views/template2.php');


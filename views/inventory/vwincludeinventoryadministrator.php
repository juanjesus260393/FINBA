<div hidden="true">
    <?php
    session_start();
    require_once("../models/mdlsecurity.php");
    mdlsecurity::validateToken();
    ?>
</div>
<link rel="stylesheet" href="../css/scrolltabla.css">
<div class="container">
    <center><h2>Inventario</h2></center>   
    <center> <table class="table table-fixed">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Escuela</th>
                    <th>Referencia</th>
                    <th>Imagen</th>
                    <th>Estado</th>
                    <th>Eliminar</th>
                    <th>Modificar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $listofinventarioadministrador;
                if (empty($listofinventarioadministrador)) {
                    $voidarray = array();
                    $listofinventarioadministrador = $voidarray;
                }
                for ($i = 0; $i < count($listofinventarioadministrador); $i++) {
                    ?>
                    <tr  class='btn-outline-primary'>
                        <td><?php echo $listofinventarioadministrador[$i]["spender_name"]; ?></td>
                        <td><?php echo $listofinventarioadministrador[$i]["quantity"]; ?></td>
                        <td><?php echo $listofinventarioadministrador[$i]["school"]; ?></td>
                        <td><?php echo $listofinventarioadministrador[$i]["reference"]; ?></td>
                         <td><?php
                            $imagen_inventory = $listofinventarioadministrador[$i]["img_inventory"];
                            echo ('<span><img src="../resources/img/inventario/' . $imagen_inventory . '" width="152" height="118"></span>');
                            ?>
                        </td>
                        <?php
                        if ($listofinventarioadministrador[$i]["enabled"] == '0') {
                            printf("<td height='80'  style='color: #EA1515 ;'><h5><b>Deshabilitado</b></h5></td>");
                        } else if ($listofinventarioadministrador[$i]["enabled"] == '1') {
                            printf("<td height='80'  style='color: blue ;'><h5><b>Habilitado</b></h5></td>");
                        }
                        ?>
                        <td> 
                            <?php
                            $id_inventory = $listofinventarioadministrador[$i]["id_inventory"];
                            $id_spenders = $listofinventarioadministrador[$i]["id_spenders"];
                            $id_nomenclature = $listofinventarioadministrador[$i]["id_nomenclature"];
                            $status = $listofinventarioadministrador[$i]["enabled"];
                            $cantidad = $listofinventarioadministrador[$i]["quantity"];
                            $image = $listofinventarioadministrador[$i]["img_inventory"];
                            $delete = TRUE;
                            echo '<a href="../controllers/crtinventory.php?id_inventorydelete=' . $id_inventory . ''
                                    . '&id_spendersdelete=' . $id_spenders . '&id_nomenclaturedelete=' . $id_nomenclature . ''
                                    . '&status=' . $status . ''
                                    . '&cantidad=' . $cantidad . '&delete=' . $delete . '&image=' . $image . '"'
                            . 'onclick="if (!confirm(\'Estas seguro que quieres eliminar este elemento?\')) '
                            . '{ return false}"><img src="../resources/img/eliminar.jpg"></a>'
                            ?></td>
                        <td><form method="post" action="../controllers/crtinventory.php">
                                <?php
                                $id_inventoryupdate = $listofinventarioadministrador[$i]["id_inventory"];
                                $id_spendersupdate = $listofinventarioadministrador[$i]["id_spenders"];
                                $id_nomenclatureupdate = $listofinventarioadministrador[$i]["id_nomenclature"];
                                $quantityupdate = $listofinventarioadministrador[$i]["quantity"];
                                $enabledupdate = $listofinventarioadministrador[$i]["enabled"];
                                $referenceupdate = $listofinventarioadministrador[$i]["reference"];
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
</div>  
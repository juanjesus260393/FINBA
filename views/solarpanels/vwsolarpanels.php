<div hidden="true">
    <?php
    session_start();
    require_once("C:/xampp/htdocs/finbaproject/FINBA/models/mdlsecurity.php");
    mdlsecurity::validateToken();
    ?>
</div>
<div>
    <center><h2>Paneles Solares</h2></center>   
    <center> <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Referencia</th>
                    <th>Estado</th>
                    <th>Imagen</th>
                    <th>Eliminar</th>
                    <th>Modificar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $listofsolarpanels;
                if (empty($listofsolarpanels)) {
                    $voidarray = array();
                    $listofsolarpanels = $voidarray;
                }
                for ($i = 0; $i < count($listofsolarpanels); $i++) {
                    ?>
                    <tr  class='btn-outline-primary'>
                        <td><?php echo $listofsolarpanels[$i]["solar_panel_name"]; ?></td>
                        <td><?php echo $listofsolarpanels[$i]["reference"]; ?></td>
                        <?php
                        if ($listofsolarpanels[$i]["enabled"] == '0') {
                            printf("<td height='80'  style='color: #EA1515 ;'><h5><b>Deshabilitado</b></h5></td>");
                        } else if ($listofsolarpanels[$i]["enabled"] == '1') {
                            printf("<td height='80'  style='color: blue ;'><h5><b>Habilitado</b></h5></td>");
                        }
                        ?>
                        <td><?php
                            $imagen_panel = $listofsolarpanels[$i]["id_image_panel"];
                            echo ('<span><img src="../resources/solarpanel/' . $imagen_panel . '" width="152" height="118"></span>');
                            ?>
                        </td>
                        <td> 
                            <?php
                            $id_solar_panel = $listofsolarpanels[$i]["id_solar_panel"];
                            $id_nomenclature = $listofsolarpanels[$i]["id_nomenclature"];
                            $status = $listofsolarpanels[$i]["enabled"];
                            $image = $listofsolarpanels[$i]["id_image_panel"];
                            $delete = TRUE;
                            echo '<a href="../controllers/crtsolarpanels.php?id_solar_panel=' . $id_solar_panel . '&id_nomenclaturedelete=' . $id_nomenclature . '&status=' . $status . '&delete=' . $delete . '&image=' . $image . '"'
                            . 'onclick="if (!confirm(\'Estas seguro que quieres eliminar este panel?\')) '
                            . '{ return false}"><img src="../resources/img/eliminar.jpg"></a>'
                            ?></td>
                        <td><form method="post" action="../controllers/crtsolarpanels.php">
                                <?php
                                $id_solar_panelupdate = $listofsolarpanels[$i]["id_solar_panel"];
                                $id_nomenclatureupdate = $listofsolarpanels[$i]["id_nomenclature"];
                                $enabledupdate = $listofsolarpanels[$i]["enabled"];
                                $referenceupdate = $listofsolarpanels[$i]["reference"];
                                $image_prev = $listofsolarpanels[$i]["id_image_panel"];
                                $updatepanel = TRUE;
                                echo "<input type='hidden' id='id_solar_panel_update' name='id_solar_panel_update' value='$id_solar_panelupdate'> "
                                . "<input type='hidden' id='id_nomenclatureupdate' name='id_nomenclatureupdate' value='$id_nomenclatureupdate'>"
                                . "<input type='hidden' id='enabledupdate' name='enabledupdate' value='$enabledupdate'>"
                                . "<input type='hidden' id='referenceupdate' name='referenceupdate' value='$referenceupdate'>"
                                . "<input type='hidden' id='updatepanel' name='updatepanel' value='$updatepanel'>"
                                . "<input type='hidden' id='image_prev' name='image_prev' value='$image_prev'>"
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
        <form method="post" action="../controllers/crtsolarpanels.php" name="form1" enctype="multipart/form-data">
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
                    <input type="submit" class="btn btn-primary"value="Registrar Panel Solar" >
                </div></center>
        </form>
    </center> 
</div>  





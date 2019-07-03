<div hidden="true">
    <?php
    session_start();
    require_once("C:/xampp/htdocs/finbaproject/FINBA/models/mdlsecurity.php");
    mdlsecurity::validateToken();
    ?>
</div>
<div>
    <link rel="stylesheet" href="../css/scrolltabla.css">
    <center><h1>Inversores</h1></center>   
    <center> <table class="table table-fixed">
            <thead>
                <tr>
                    <th>N° de Inversor</th>
                    <th>Nombre del inversor</th>
                    <th>Ubicacion</th>
                    <th>Estado</th>
                    <th>Imagen</th>
                    <?php
                    if ($_SESSION['Schoolsname'] == 'ESCOM') {
                        include('../views/solarpanels/tdedificio.php');
                    }
                    ?>
                    <th>Deshabilitar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $listofinvestors;
                if (empty($listofinvestors)) {
                    $voidarray = array();
                    $listofinvestors = $voidarray;
                }
                for ($i = 0; $i < count($listofinvestors); $i++) {
                    ?>
                    <tr  class='btn-outline-primary'>
                        <td><?php echo $listofinvestors[$i]["number_investor"]; ?></td>
                        <td><?php echo $listofinvestors[$i]["name_investor"]; ?></td>
                        <td><?php echo $listofinvestors[$i]["location"]; ?></td>
                        <?php
                        if ($listofinvestors[$i]["enabled"] == '0') {
                            printf("<td height='80'  style='color: #EA1515 ;'><h5><b>Deshabilitado</b></h5></td>");
                        } else if ($listofinvestors[$i]["enabled"] == '1') {
                            printf("<td height='80'  style='color: blue ;'><h5><b>Habilitado</b></h5></td>");
                        }
                        ?>
                        <td><?php
                            $imagen_investor = $listofinvestors[$i]["id_img_investor"];
                            echo ('<span><img src="../resources/img/investores/' . $imagen_investor . '" width="152" height="118"></span>');
                            ?>
                        </td>
                        <?php
                        if ($_SESSION['Schoolsname'] == 'ESCOM') {
                            include('../views/solarpanels/tdbuild.php');
                        }
                        ?>
                        <td> 
                            <?php
                            $number_investoru = $listofinvestors[$i]["number_investor"];
                            $disabled = TRUE;
                            echo '<a href="../controllers/crtsolarpanels.php?number_investoru=' . $number_investoru . '&disabled=' . $disabled . '"'
                            . 'onclick="if (!confirm(\'Estas seguro que quieres deshabilitar el inversor?\')) '
                            . '{ return false}"><img src="../resources/img/disabled.png"></a>'
                            ?></td>
                        <td> 
                            <?php
                            $number_investore = $listofinvestors[$i]["number_investor"];
                            $id_sola_nomenclature = $listofinvestors[$i]["id_sola_nomenclature"];
                            $statusi = $listofinvestors[$i]["enabled"];
                            $imagei = $listofinvestors[$i]["id_img_investor"];
                            $deletei = TRUE;
                            echo '<a href="../controllers/crtsolarpanels.php?number_investore=' . $number_investore . ''
                            . '&id_sola_nomenclature=' . $id_sola_nomenclature . '&statusi=' . $statusi . ''
                            . '&deletei=' . $deletei . '&imagei=' . $imagei . '"'
                            . 'onclick="if (!confirm(\'Estas seguro que quieres eliminar este Inversor?\')) '
                            . '{ return false}"><img src="../resources/img/eliminar.jpg"></a>'
                            ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table></center>
    <center><h1>Paneles Solares</h1></center>   
    <center> <table class="table table-fixed">
            <thead>
                <tr>
                    <th>Nombre del Panel</th>
                    <th>N° de Inversor</th>
                    <th>Estado</th>
                    <th>Imagen</th>
                    <th>Deshabilitar</th>
                    <th>Eliminar</th>
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
                        <td><?php echo $listofsolarpanels[$i]["number_investor"]; ?></td>
                        <?php
                        if ($listofsolarpanels[$i]["enabled"] == '0') {
                            printf("<td height='80'  style='color: #EA1515 ;'><h5><b>Deshabilitado</b></h5></td>");
                        } else if ($listofsolarpanels[$i]["enabled"] == '1') {
                            printf("<td height='80'  style='color: blue ;'><h5><b>Habilitado</b></h5></td>");
                        }
                        ?>
                        <td><?php
                            $imagen_panel = $listofsolarpanels[$i]["id_image_panel"];
                            echo ('<span><img src="../resources/img/paneles/' . $imagen_panel . '" width="152" height="118"></span>');
                            ?>
                        </td>
                        <td>
                            <?php
                            $id_solar_panelupdate = $listofsolarpanels[$i]["id_solar_panel"];
                            $id_nomenclatureupdate = $listofsolarpanels[$i]["id_solar_nomenclature"];
                            $enabledupdate = $listofsolarpanels[$i]["enabled"];
                            $referenceupdate = $listofsolarpanels[$i]["reference"];
                            $image_prev = $listofsolarpanels[$i]["id_image_panel"];
                            $updatepanel = TRUE;
                            echo '<a href="../controllers/crtsolarpanels.php?id_solar_panelu=' . $id_solar_panelupdate . '&disabledu=' . $updatepanel . '"'
                            . 'onclick="if (!confirm(\'Estas seguro que quieres deshabilitar el panel?\')) '
                            . '{ return false}"><img src="../resources/img/disabled.png"></a>'
                            ?></td>
                        <td> 
                            <?php
                            $id_solar_panel = $listofsolarpanels[$i]["id_solar_panel"];
                            $id_nomenclature = $listofsolarpanels[$i]["id_solar_nomenclature"];
                            $status = $listofsolarpanels[$i]["enabled"];
                            $image = $listofsolarpanels[$i]["id_image_panel"];
                            $delete = TRUE;
                            echo '<a href="../controllers/crtsolarpanels.php?id_solar_panel=' . $id_solar_panel . '&id_nomenclaturedelete=' . $id_nomenclature . '&status=' . $status . '&delete=' . $delete . '&image=' . $image . '"'
                            . 'onclick="if (!confirm(\'Estas seguro que quieres eliminar este panel?\')) '
                            . '{ return false}"><img src="../resources/img/eliminar.jpg"></a>'
                            ?></td>

                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table></center>
</div>  





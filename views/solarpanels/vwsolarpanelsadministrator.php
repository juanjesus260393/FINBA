<div hidden="true">
    <?php
    session_start();
    require_once("../models/mdlsecurity.php");
    mdlsecurity::validateToken();
    ?>
</div>
<div>
    <link rel="stylesheet" href="../css/scrolltabla.css">
    <center><h1>Inversores</h1></center>   
    <div class="container">
        <center> <table class="table table-fixed">
                <thead>
                    <tr>
                        <th>N° de Inversor</th>
                        <th>Nombre del inversor</th>
                        <th>Escuela</th>
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
                    $listofinvestorsadministrator;
                    if (empty($listofinvestorsadministrator)) {
                        $voidarray = array();
                        $listofinvestorsadministrator = $voidarray;
                    }
                    for ($i = 0; $i < count($listofinvestorsadministrator); $i++) {
                        ?>
                        <tr>
                            <td><?php echo $listofinvestorsadministrator[$i]["number_investor"]; ?></td>
                            <td><?php echo $listofinvestorsadministrator[$i]["name_investor"]; ?></td>
                            <td><?php echo $listofinvestorsadministrator[$i]["school"]; ?></td>
                            <?php
                            if ($listofinvestorsadministrator[$i]["enabled"] == '0') {
                                printf("<td style='color: #EA1515 ;'><h5><b>Deshabilitado</b></h5></td>");
                            } else if ($listofinvestorsadministrator[$i]["enabled"] == '1') {
                                printf("<td style='color: blue ;'><h5><b>Habilitado</b></h5></td>");
                            }
                            ?>
                            <td class="col-xs-3"><?php
                                $imagen_investor = $listofinvestorsadministrator[$i]["id_img_investor"];
                                echo ('<span><img src="../resources/img/investores/' . $imagen_investor . '" width="90" height="90"></span>');
                                ?>
                            </td>
                            <?php
                            if ($_SESSION['Schoolsname'] == 'ESCOM') {
                                include('../views/solarpanels/tdbuild.php');
                            }
                            ?>
                            <td> 
                                <?php
                                $number_investoru = $listofinvestorsadministrator[$i]["number_investor"];
                                $disabled = TRUE;
                                echo '<a href="../controllers/crtsolarpanels.php?number_investoru=' . $number_investoru . '&disabled=' . $disabled . '"'
                                . 'onclick="if (!confirm(\'Estas seguro que quieres deshabilitar el inversor?\')) '
                                . '{ return false}"><img src="../resources/img/disabled.png"></a>'
                                ?></td>
                            <td> 
                                <?php
                                $number_investore = $listofinvestorsadministrator[$i]["number_investor"];
                                $id_sola_nomenclature = $listofinvestorsadministrator[$i]["id_sola_nomenclature"];
                                $statusi = $listofinvestorsadministrator[$i]["enabled"];
                                $imagei = $listofinvestorsadministrator[$i]["id_img_investor"];
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
    </div>
    <center><h1>Paneles Solares</h1></center> 
    <center> <table class="table table-fixed">
            <thead>
                <tr>
                    <th class="col-xs-3">Nombre del Panel</th>
                    <th class="col-xs-3">N° de Inversor</th>
                    <th class="col-xs-3">Estado</th>
                    <th class="col-xs-3">Escuela</th>
                    <th class="col-xs-3">Imagen</th>
                    <th class="col-xs-3">Deshabilitar</th>
                    <th class="col-xs-3">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $listofsolarpanelsadministrator;
                if (empty($listofsolarpanelsadministrator)) {
                    $voidarray = array();
                    $listofsolarpanelsadministrator = $voidarray;
                }
                for ($i = 0; $i < count($listofsolarpanelsadministrator); $i++) {
                    ?>
                    <tr>
                        <td class="col-xs-3"><?php echo $listofsolarpanelsadministrator[$i]["solar_panel_name"]; ?></td>
                        <td class="col-xs-3"><?php echo $listofsolarpanelsadministrator[$i]["number_investor"]; ?></td>
                        <?php
                        if ($listofsolarpanelsadministrator[$i]["enabled"] == '0') {
                            printf("<td class='col-xs-3'><h5><b>Deshabilitado</b></h5></td>");
                        } else if ($listofsolarpanelsadministrator[$i]["enabled"] == '1') {
                            printf("<td class='col-xs-3'><h5><b>Habilitado</b></h5></td>");
                        }
                        ?>
                        <td class="col-xs-3"><?php echo $listofsolarpanelsadministrator[$i]["school"]; ?></td>
                        <td class="col-xs-3"><?php
                            $imagen_panel = $listofsolarpanelsadministrator[$i]["id_image_panel"];
                            echo ('<span><img src="../resources/img/paneles/' . $imagen_panel . '" width="152" height="118"></span>');
                            ?>
                        </td>
                        <td class="col-xs-3">
                            <?php
                            $id_solar_panelupdate = $listofsolarpanelsadministrator[$i]["id_solar_panel"];
                            $id_nomenclatureupdate = $listofsolarpanelsadministrator[$i]["id_solar_nomenclature"];
                            $enabledupdate = $listofsolarpanelsadministrator[$i]["enabled"];
                            $referenceupdate = $listofsolarpanelsadministrator[$i]["reference"];
                            $image_prev = $listofsolarpanelsadministrator[$i]["id_image_panel"];
                            $updatepanel = TRUE;
                            echo '<a href="../controllers/crtsolarpanels.php?id_solar_panelu=' . $id_solar_panelupdate . '&disabledu=' . $updatepanel . '"'
                            . 'onclick="if (!confirm(\'Estas seguro que quieres deshabilitar el panel?\')) '
                            . '{ return false}"><img src="../resources/img/disabled.png"></a>'
                            ?></td>
                        <td class="col-xs-3"> 
                            <?php
                            $id_solar_panel = $listofsolarpanelsadministrator[$i]["id_solar_panel"];
                            $id_nomenclature = $listofsolarpanelsadministrator[$i]["id_solar_nomenclature"];
                            $status = $listofsolarpanelsadministrator[$i]["enabled"];
                            $image = $listofsolarpanelsadministrator[$i]["id_image_panel"];
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


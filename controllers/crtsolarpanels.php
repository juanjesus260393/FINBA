<?php

//modelos o auxiliares adicionales para la administracion de la informacion relacionada con la administracion de los paneles solares
require_once("../models/mdlsolarpanel.php");
require_once("C:/xampp/htdocs/finbaproject/FINBA/resources/helpers/validations.php");

$searchpanels = filter_input(INPUT_POST, 'searchpanels');

//Variables para abrir la vista de insecion de los paneles solares
$insert = filter_input(INPUT_POST, 'insert');

//Variables para la insercion de la informacion de los paneles solares.
$panelname = filter_input(INPUT_POST, 'panelname');
$school = filter_input(INPUT_POST, 'school');
$building_number = filter_input(INPUT_POST, 'building_number');
$level = filter_input(INPUT_POST, 'level');
$orientation = filter_input(INPUT_POST, 'orientation');
$location = filter_input(INPUT_POST, 'location');
$reference = filter_input(INPUT_POST, 'reference');
$registry_number = filter_input(INPUT_POST, 'registry_number');

//variables utulizadas para llamar la visa de actualizar un panel solar 
$id_solar_panel_update = filter_input(INPUT_POST, 'id_solar_panel_update');
$id_nomenclatureupdate = filter_input(INPUT_POST, 'id_nomenclatureupdate');
$updatepanel = filter_input(INPUT_POST, 'updatepanel');
$enabledupdate = filter_input(INPUT_POST, 'enabledupdate');
$referenceupdate = filter_input(INPUT_POST, 'referenceupdate');

//variables utilizadas en la actualizacion de un panel solar
$updateidpanel = filter_input(INPUT_POST, 'updateidpanel');
$updatenomenclature = filter_input(INPUT_POST, 'updatenomenclature');
$enabledpreviouspost = filter_input(INPUT_POST, 'enabledpreviouspost');
$referencepreviouspost = filter_input(INPUT_POST, 'referencepreviouspost');
$newenable = filter_input(INPUT_POST, 'newenable');
$newreference = filter_input(INPUT_POST, 'newreference');

//Variables para la eliminacion del registro de un panel solar, variables tipo GET
$id_solar_panel = filter_input(INPUT_GET, 'id_solar_panel');
$id_nomenclaturedelete = filter_input(INPUT_GET, 'id_nomenclaturedelete');
$status = filter_input(INPUT_GET, 'status');
$delete = filter_input(INPUT_GET, 'delete');

//se llama la funcion insetar panel
if (!empty($panelname) && !empty($school) && !empty($building_number) && !empty($level) && !empty($orientation) && !empty($location) && !empty($reference) && !empty($registry_number)) {
    $validation = panelHelper::validateInformationpanels($registry_number);
    if ($validation) {
        mdlsolarpanel::insertPanel($panelname, $school, $building_number, $level, $orientation, $location, $reference, $registry_number);
        $panels = new mdlsolarpanel;
        $listofsolarpanels = $panels->getSolarpanels();
        echo '<script language = javascript>
	self.location = "../controllers/crtsolarpanels.php"
	</script>';
    } else {
        inventoryhelper::dataVoid();
    }
}
//se muestra la vista actualizar panel
if ($updatepanel) {
    require_once("../views/solarpanels/vwupdatepanel.php");
}
//se actualiza la informacion de un panel en especifico
if (!empty($updateidpanel) && !empty($updatenomenclature)) {
    mdlsolarpanel::updatePanel($updateidpanel, $updatenomenclature, $enabledpreviouspost, $referencepreviouspost, $newenable, $newreference);
    $panels = new mdlsolarpanel;
    $listofsolarpanels = $panels->getSolarpanels();
    echo '<script language = javascript>
	self.location = "../controllers/crtsolarpanels.php"
	</script>';
}
//se elemina el registro de un panel solar
if ($delete && !empty($id_solar_panel) && !empty($id_nomenclaturedelete)) {
    mdlsolarpanel::deletePanel($id_solar_panel, $id_nomenclaturedelete, $status);
    $panels = new mdlsolarpanel;
    $listofsolarpanels = $panels->getSolarpanels();
    echo '<script language = javascript>
	self.location = "../controllers/crtsolarpanels.php"
	</script>';
}
//se muestra la vista que permite a un usuario agregar un panel solar
if ($insert && !empty($insert)) {
    require_once("../views/solarpanels/vwaddsolarpanel.php");
}
//Se muestra la lista de los paneles solares registrados por la escuela que ha iniciado sesion
else {
    $panels = new mdlsolarpanel;
    $listofsolarpanels = $panels->getSolarpanels();
    require_once("../views/solarpanels/vwmanagesolarpanels.php");
}



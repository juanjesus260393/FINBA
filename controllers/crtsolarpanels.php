<?php

//modelos o auxiliares adicionales para la administracion de la informacion relacionada con la administracion de los paneles solares
require_once("../models/mdlsolarpanel.php");
require_once("C:/xampp/htdocs/finbaproject/FINBA/resources/helpers/validations.php");

//Variable para busquedad de paneles
$searchpanels = filter_input(INPUT_POST, 'searchpanels');

//Variables para abrir la vista de insecion de los paneles solares
$insert = filter_input(INPUT_POST, 'insert');

//Variables para la insercion de la informacion de los paneles solares.
$insert_panel = filter_input(INPUT_POST, 'insert_panel');
$panelname = filter_input(INPUT_POST, 'panelname');
$number_panel = filter_input(INPUT_POST, 'number_panel');
$number_investorp = filter_input(INPUT_POST, 'number_investorp');
$row = filter_input(INPUT_POST, 'row');
$location_investorp = filter_input(INPUT_POST, 'location_investorp');
$id_image_panel = $_FILES['id_image_panel']['name'];
$number_build_solarp = filter_input(INPUT_POST, 'number_build_solarp');

//Variables para la insercion de la informacion de los inversores
$number_investor = filter_input(INPUT_POST, 'number_investor');
$name_investor = filter_input(INPUT_POST, 'name_investor');
$school_investor = filter_input(INPUT_POST, 'school_investor');
$insert_investor = filter_input(INPUT_POST, 'insert_investor');
$location_investor = filter_input(INPUT_POST, 'location_investori');
$number_build_solar = filter_input(INPUT_POST, 'number_build_solar');
$id_img_investor = $_FILES['id_img_investor']['name'];

//variables utulizadas para llamar la vista de actualizar un panel solar 
$id_solar_panel_update = filter_input(INPUT_POST, 'id_solar_panel_update');
$id_nomenclatureupdate = filter_input(INPUT_POST, 'id_nomenclatureupdate');
$updatepanel = filter_input(INPUT_POST, 'updatepanel');
$enabledupdate = filter_input(INPUT_POST, 'enabledupdate');
$referenceupdate = filter_input(INPUT_POST, 'referenceupdate');
$image_prev = filter_input(INPUT_POST, 'image_prev');

//variables utilizadas en la actualizacion de un panel solar
$updateidpanel = filter_input(INPUT_POST, 'updateidpanel');
$updatenomenclature = filter_input(INPUT_POST, 'updatenomenclature');
$enabledpreviouspost = filter_input(INPUT_POST, 'enabledpreviouspost');
$referencepreviouspost = filter_input(INPUT_POST, 'referencepreviouspost');
$imagepreviouspost = filter_input(INPUT_POST, 'imagepreviouspost');
$id_image_panel_new = $_FILES['id_image_panel_new']['name'];
$newenable = filter_input(INPUT_POST, 'newenable');
$newreference = filter_input(INPUT_POST, 'newreference');

//Variables para la eliminacion del registro de un panel solar, variables tipo GET
$id_solar_panel = filter_input(INPUT_GET, 'id_solar_panel');
$id_nomenclaturedelete = filter_input(INPUT_GET, 'id_nomenclaturedelete');
$status = filter_input(INPUT_GET, 'status');
$delete = filter_input(INPUT_GET, 'delete');
$image = filter_input(INPUT_GET, 'image');

//Numero de investor para su deshabilitacion
$number_investoru = filter_input(INPUT_GET, 'number_investoru');
$disabled = filter_input(INPUT_GET, 'disabled');

//Datos empleados en la eliminacion de los investores
$number_investore = filter_input(INPUT_GET, 'number_investore');
$id_sola_nomenclature = filter_input(INPUT_GET, 'id_sola_nomenclature');
$statusi = filter_input(INPUT_GET, 'statusi');
$imagei = filter_input(INPUT_GET, 'imagei');
$deletei = filter_input(INPUT_GET, 'deletei');

//Informacion para deshabilitar los paneles solares
$id_solar_panelu = filter_input(INPUT_GET, 'id_solar_panelu');
$disabledu = filter_input(INPUT_GET, 'disabledu');

//Se llama al metodo eliminar investor
if ($deletei && !empty($number_investore) && !empty($id_sola_nomenclature)) {
    mdlsolarpanel::deleteInvestor($number_investore, $id_sola_nomenclature, $statusi, $imagei);
    $panels = new mdlsolarpanel;
    $listofsolarpanels = $panels->getSolarpanels();
    $listofinvestors = $panels->getInvestor();
    echo '<script language = javascript>
	self.location = "../controllers/crtsolarpanels.php"
	</script>';
}

//Deshabilitar panel solar
if ($disabledu && !empty($id_solar_panelu)) {
    mdlsolarpanel::disabledPanel($id_solar_panelu);
    $panels = new mdlsolarpanel;
    $listofsolarpanels = $panels->getSolarpanels();
    $listofinvestors = $panels->getInvestor();
    echo '<script language = javascript>
	self.location = "../controllers/crtsolarpanels.php"
	</script>';
}

//Deshabilitar investor
if ($disabled && !empty($number_investoru)) {
    mdlsolarpanel::disabledInvestor($number_investoru);
    $panels = new mdlsolarpanel;
    $listofsolarpanels = $panels->getSolarpanels();
    $listofinvestors = $panels->getInvestor();
    echo '<script language = javascript>
	self.location = "../controllers/crtsolarpanels.php"
	</script>';
}

//Insetar panel
if ($insert_panel && !empty($panelname) && !empty($number_panel)) {
    mdlsolarpanel::insertPanel($panelname, $number_panel, $number_investorp, $row, $id_image_panel, $school_investor, $location_investorp, $number_build_solarp);
   
}

//se llama la funcion insetar investor
if ($insert_investor) {
    mdlsolarpanel::insertInvestor($number_investor, $name_investor, $school_investor, $location_investor, $id_img_investor, $number_build_solar);
    $panels = new mdlsolarpanel;
    $listofsolarpanels = $panels->getSolarpanels();
    $listofinvestors = $panels->getInvestor();
    echo '<script language = javascript>
	self.location = "../controllers/crtsolarpanels.php"
	</script>';
}

//se muestra la vista actualizar panel
if ($updatepanel) {
    require_once("../views/solarpanels/vwupdatepanel.php");
}

//se actualiza la informacion de un panel en especifico
if (!empty($updateidpanel) && !empty($updatenomenclature)) {
    mdlsolarpanel::updatePanel($updateidpanel, $updatenomenclature, $enabledpreviouspost, $referencepreviouspost, $newenable, $newreference, $id_image_panel_new, $imagepreviouspost);
    $panels = new mdlsolarpanel;
    $listofsolarpanels = $panels->getSolarpanels();
    echo '<script language = javascript>
	self.location = "../controllers/crtsolarpanels.php"
	</script>';
}

//se elemina el registro de un panel solar
if ($delete && !empty($id_solar_panel) && !empty($id_nomenclaturedelete)) {
    mdlsolarpanel::deletePanel($id_solar_panel, $id_nomenclaturedelete, $status, $image);
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
    $listofinvestors = $panels->getInvestor();
    require_once("../views/solarpanels/vwmanagesolarpanels.php");
}



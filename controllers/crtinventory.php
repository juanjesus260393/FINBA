<?php

//requieres adicionales
require_once("C:/xampp/htdocs/finbaproject/FINBA/resources/helpers/validations.php");
require_once("../models/mdlinventory.php");

//Variables post
//Variable para la busquedad del inventario
$searchinventory = filter_input(INPUT_POST, 'searchinventory');

//Variables para la insercion de los registros del inventario
$insert = filter_input(INPUT_POST, 'insert');
$elementname = filter_input(INPUT_POST, 'elementname');
$quantity = filter_input(INPUT_POST, 'quantity');
$img_inventory = $_FILES['img_inventory']['name'];
$school = filter_input(INPUT_POST, 'school');
$building_number = filter_input(INPUT_POST, 'building_number');
$level = filter_input(INPUT_POST, 'level');
$orientation = filter_input(INPUT_POST, 'orientation');
$location = filter_input(INPUT_POST, 'location');
$reference = filter_input(INPUT_POST, 'reference');
$registry_number = filter_input(INPUT_POST, 'registry_number');
$ceroone = '0';
$cerotwo = '0';

//Variables para la eliminacion del registro del inventario, variables tipo GET
$id_inventorydelete = filter_input(INPUT_GET, 'id_inventorydelete');
$id_spendersdelete = filter_input(INPUT_GET, 'id_spendersdelete');
$id_nomenclature = filter_input(INPUT_GET, 'id_nomenclaturedelete');
$status = filter_input(INPUT_GET, 'status');
$cantidad = filter_input(INPUT_GET, 'cantidad');
$delete = filter_input(INPUT_GET, 'delete');
$image = filter_input(INPUT_GET, 'image');


//variables utulizadas para llamar la visa de actualizar elemento del inventario
$id_inventoryupdate = filter_input(INPUT_POST, 'id_inventoryupdate');
$id_spendersupdate = filter_input(INPUT_POST, 'id_spendersupdate');
$id_nomenclatureupdate = filter_input(INPUT_POST, 'id_nomenclatureupdate');
$updateinventory = filter_input(INPUT_POST, 'updateinventory');
$quantityupdate = filter_input(INPUT_POST, 'quantityupdate');
$enabledupdate = filter_input(INPUT_POST, 'enabledupdate');
$referenceupdate = filter_input(INPUT_POST, 'referenceupdate');

//Variables que se emplean en la actualizacion de un elemento del inventario
$updateinventorynew = filter_input(INPUT_POST, 'updateinventorynew');
$id_spendersupdatenew = filter_input(INPUT_POST, 'id_spendersupdatenew');
$id_nomenclatureupdatenew = filter_input(INPUT_POST, 'id_nomenclatureupdatenew');
$newenable = filter_input(INPUT_POST, 'newenable');
$newquantity = filter_input(INPUT_POST, 'newquantity');
$newreference = filter_input(INPUT_POST, 'newreference');
$enabledpreviouspost = filter_input(INPUT_POST, 'enabledpreviouspost');
$quantitypreviouspost = filter_input(INPUT_POST, 'quantitypreviouspost');
$referencepreviouspost = filter_input(INPUT_POST, 'referencepreviouspost');

//llamar la vista de insertar inventario
if (!empty($insert) && $insert == TRUE) {
    echo '<script language = javascript>
	self.location = "../views/inventory/vwaddinventory.php"
	</script>';
}
//Validacion por si los numeros son ingresados con un valor cero
if ($registry_number == $cerotwo || $quantity == $ceroone) {
    inventoryhelper::numberCero();
}
//Insercion del registro de un elemento del inventario
if (!empty($quantity) && !empty($elementname) && !empty($reference) && !empty($registry_number)) {
    $validation = inventoryhelper::validationInsertinventory($quantity, $elementname, $reference, $registry_number);
    if ($validation) {
        mdlinventory::insertinventory($quantity, $elementname, $school, $building_number, $level, $orientation, $location, $reference, $registry_number, $img_inventory);
        $inventory = new mdlinventory;
        $listofinventario = $inventory->getinventory();
        echo '<script language = javascript>
	self.location = "../controllers/crtinventory.php"
	</script>';
    } else {
        inventoryhelper::dataVoid();
    }
}
//Eliminacion del registro de un elemento del inventario
if ($delete && !empty($id_inventorydelete) && !empty($id_spendersdelete) && !empty($id_nomenclature)) {
    mdlinventory::deleteinventory($id_inventorydelete, $id_spendersdelete, $id_nomenclature, $status, $cantidad, $image);
    $inventory = new mdlinventory;
    $listofinventario = $inventory->getinventory();
    echo '<script language = javascript>
	self.location = "../controllers/crtinventory.php"
	</script>';
}

//llamar la vista actualizar inventario
if ($updateinventory) {
    require_once("../views/inventory/vwupdateinventory.php");
}
//Se envia la informacion a actualizar de un elemento del inventario
if (!empty($updateinventorynew) && !empty($id_spendersupdatenew) && !empty($id_nomenclatureupdatenew)) {
    mdlinventory::updateInventory($updateinventorynew, $id_spendersupdatenew, $id_nomenclatureupdatenew, $enabledpreviouspost, $quantitypreviouspost, $referencepreviouspost, $newenable, $newquantity, $newreference);
    $inventory = new mdlinventory;
    $listofinventario = $inventory->getinventory();
    echo '<script language = javascript>
	self.location = "../controllers/crtinventory.php"
	</script>';
}
//busqueda del inventario
else {
    $inventory = new mdlinventory;
    $listofinventario = $inventory->getinventory();
    $listofinventarioadministrador = $inventory->getinventoryadministrator();
    require_once("../views/inventory/vwmanageinventory.php");
}
 
    
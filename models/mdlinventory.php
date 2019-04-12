<?php

/*
 *   proyecto FINBA
 *   Nombre: mdlinventory
 *   Autor: Juan Jesus Garcia Centeno
 *   Fecha: 19-03-2011
 *   Versión: 1.0
 *   Descripcion: modelo en el que se establecen las funciones necesarias para la correcta administracion de los elementos del inventario.
 * 
 *   por Fabrica de Software, CIC-IPN
 */

//Modelos adicionales que requiere el archivo, dado que algunas funciones se encuentran en dichos archivos
require_once('mdlconection.php');
require_once("C:/xampp/htdocs/finbaproject/FINBA/resources/helpers/validations.php");

//require_once("C:/xampp/htdocs/finbaproject/FINBA/models/mdlauth.php");
//Evitar Notificar todos los errores de PHP
error_reporting(0);

class mdlinventory {

//Variables empleada para la obtencion del inventario 
    private $inventory;
    private $dbh;

    public function __construct() {
        $this->dbh = mdlconection::connect();
    }

    /*
     *  getinventory
     *  Funcion que se encarga de obtener los elementos registrados en la tabla inventario.
     */

    public function getinventory() {
        session_start();
        $getinventory = "SELECT e.spender_name, e.quantity, n.school,n.reference, i.enabled, i.username,i.id_inventory, 
        e.id_spenders,n.id_nomenclature, i.img_inventory FROM dbfinba.inventory i inner join dbfinba.energy_spenders e 
        on i.id_spenders = e.id_spenders inner join dbfinba.nomenclature n 
        on i.id_nomenclature = n.id_nomenclature where n.school = '" . $_SESSION['Schoolsname'] . "'";
        if (empty($this->dbh->query($getinventory))) {
            $this->inventory[] = NULL;
        } else {
            foreach ($this->dbh->query($getinventory) as $inventoryarray) {
                $this->inventory[] = $inventoryarray;
                //print_r($usersarray);
            }
        }
        return $this->inventory;
    }

    /*
     *  insertinventory
     *  Funcion que registrar la informacion del invetario en las diferentes tablas involucradas
     */

    public static function insertinventory($quantity, $elementname, $school, $building_number, $level, $orientation, $location, $reference, $registry_number, $img_inventory) {
        $username = validations::getUsername();
        if (!empty($username)) {
            mdlinventory::insertinventorytable($username, $quantity, $elementname, $school, $building_number, $level, $orientation, $location, $reference, $registry_number, $img_inventory);
        } else {
            inventoryhelper::dataVoid();
        }
    }

    /*
     *  deleteinventory
     *  Funcion que verifica las caracteristicas del elemento a eliminar y si cumple se borran los registros relacionados
     *  a dicha informacion.
     */

    public static function deleteinventory($id_inventorydelete, $id_spendersdelete, $id_nomenclature, $status, $cantidad,$image) {
        $candelete = inventoryhelper::validationDeleteinventory($status, $cantidad);
        if ($candelete) {
            mdlinventory::deleteInventorytable($id_inventorydelete, $id_spendersdelete, $id_nomenclature,$image );
        } else {
            inventoryhelper::cantDelete();
        }
    }

    /*
     *  deleteInventorytable
     *  Funcion encargada de eliminar los elementos del inventario esta funcion se manda a llamar en la funcion deleteinventory
     */

    public static function deleteInventorytable($id_inventorydelete, $id_spendersdelete, $id_nomenclature,$image) {
        $con = mdlconection::connect();
        mdlinventory::deleteImageinventory($image);
        $deleteenergyspenders = "Delete from energy_spenders where id_spenders = '" . $id_spendersdelete . "'";
        $deletenomenclature = "Delete from nomenclature where id_nomenclature = '" . $id_nomenclature . "'";
        $deleteinventory = "Delete from inventory where id_inventory = '" . $id_inventorydelete . "'";
        if (!mysqli_query($con, $deleteinventory)) {
            die('Error: ' . mysqli_error($con));
        }
        if (!mysqli_query($con, $deletenomenclature)) {
            die('Error: ' . mysqli_error($con));
        }
        if (!mysqli_query($con, $deleteenergyspenders)) {
            die('Error: ' . mysqli_error($con));
        }
    }
public static function deleteImageinventory($image) {
        if (!empty($image)) {
            $ruta = "C:/xampp/htdocs/finbaproject/FINBA/resources/img/inventario/";
            unlink($ruta . $image);
        }
    }
    /*
     *  insertinventorytable
     *  Funcion que inserta en las diferentes tablas relacionadas al inventario la informacion del registro del inventario
     */

    public static function insertinventorytable($username, $quantity, $elementname, $school, $building_number, $level, $orientation, $location, $reference, $registry_number, $img_inventory) {
        $con = mdlconection::connect();
        $image_name_insert = mdlinventory::uploadImageinventory($img_inventory);
        $id_invetory = validations::generateRamdonids();
        $id_spenders = mdlinventory::insertenergy_spenderstable($elementname, $quantity);
        $id_nomenclature = mdlinventory::insertnomenclaturetable($school, $building_number, $level, $orientation, $location, $reference, $registry_number);
        $insertintotableusers = "INSERT INTO inventory(id_inventory,id_spenders,enabled,username,id_nomenclature,img_inventory)
        VALUES('$id_invetory','$id_spenders','1','$username','$id_nomenclature','$image_name_insert')";
        if (!mysqli_query($con, $insertintotableusers)) {
            die('Error: ' . mysqli_error($con));
        }
    }

    /*
     *  insertenergy_spenderstable
     *  Funcion que crea el registro en la tabla energy_spenders esta funcion se manda a llamar en el metodo insertinventorytable
     */

    public static function uploadImageinventory($img_inventory) {
        $identificadornuevaimagen = validations::generateRamdonids();
        $new_image_panel = $identificadornuevaimagen . ".jpg";
        move_uploaded_file($_FILES['img_inventory']['tmp_name'], "C:/xampp/htdocs/finbaproject/FINBA/resources/img/inventario/$new_image_panel");
        $image_name_insert = $new_image_panel;

        return $image_name_insert;
    }

    /*
     *  insertenergy_spenderstable
     *  Funcion que crea el registro en la tabla energy_spenders esta funcion se manda a llamar en el metodo insertinventorytable
     */

    public static function insertenergy_spenderstable($elementname, $quantity) {
        $con = mdlconection::connect();
        $id_spenders = validations::generateRamdonids();
        $insertintotableenergyspenders = "INSERT INTO energy_spenders(id_spenders,spender_name,quantity)
        VALUES('$id_spenders','$elementname','$quantity')";
        if (!mysqli_query($con, $insertintotableenergyspenders)) {
            die('Error: ' . mysqli_error($con));
        }
        return $id_spenders;
    }

    /*
     *  insertnomenclaturetable
     *  Funcion que crea el registro en la tabla nomenclaturetable esta funcion se manda a llamar en el metodo insertinventorytable
     */

    public static function insertnomenclaturetable($school, $building_number, $level, $orientation, $location, $reference, $registry_number) {
        $con = mdlconection::connect();
        $id_nomenclature = validations::generateRamdonids();
        $locationchar = inventoryhelper::defineLocation($location);
        if (empty($building_number)) {
            $building_number_insert = 0;
        } else {
            $building_number_insert = $building_number;
        }
        $insertintotablenomenclature = "INSERT INTO nomenclature(id_nomenclature,school,building_number,level,orientation,location,reference,registry_number)
        VALUES('$id_nomenclature','$school','$building_number_insert','$level','$orientation','$locationchar','$reference','$registry_number')";
        if (!mysqli_query($con, $insertintotablenomenclature)) {
            die('Error: ' . mysqli_error($con));
        }
        return $id_nomenclature;
    }

    /*
     *  updateInventory
     *  Funcion que realiza la actualiza de un registro del inventario
     */

    public static function updateInventory($updateinventorynew, $id_spendersupdatenew, $id_nomenclatureupdatenew, $enabledpreviouspost, $quantitypreviouspost, $referencepreviouspost, $newenable, $newquantity, $newreference) {
        mdlinventory::updateInventorytable($updateinventorynew, $id_spendersupdatenew, $id_nomenclatureupdatenew, $enabledpreviouspost, $quantitypreviouspost, $referencepreviouspost, $newenable, $newquantity, $newreference);
    }

    /*
     *  updateInventorytable
     *  Funcion que actualiza el registro del inventario en las respectivas tablas esta funcion se manda a llamar en el metodo updateInventory
     */

    public static function updateInventorytable($updateinventorynew, $id_spendersupdatenew, $id_nomenclatureupdatenew, $enabledpreviouspost, $quantitypreviouspost, $referencepreviouspost, $newenable, $newquantity, $newreference) {
        $con = mdlconection::connect();
        echo $statusdefine = mdlinventory::defineStatusupdate($enabledpreviouspost, $newenable);
        echo $statusdefinetable = mdlinventory::defineStatusupdatetable($statusdefine);
        mdlinventory::updateEnergy_penderstable($id_spendersupdatenew, $quantitypreviouspost, $newquantity);
        mdlinventory::updatenomenclaturetable($id_nomenclatureupdatenew, $referencepreviouspost, $newreference);
        $updateintotableusers = "update inventory set enabled = '$statusdefinetable' where id_inventory = '$updateinventorynew'";
        if (!mysqli_query($con, $updateintotableusers)) {
            die('Error: ' . mysqli_error($con));
        }
    }

    /*
     *  updatenomenclaturetable
     *  Funcion que actualiza el registro de la tabla nomenclature se manda a llamar en la funcion updateInventorytable
     */

    public static function updatenomenclaturetable($id_nomenclatureupdatenew, $referencepreviouspost, $newreference) {
        $con = mdlconection::connect();
        $referenceupdate = mdlinventory::definerReferenceupdate($referencepreviouspost, $newreference);
        $updateintotableusers = "update nomenclature set reference = '$referenceupdate' where id_nomenclature = '$id_nomenclatureupdatenew'";
        if (!mysqli_query($con, $updateintotableusers)) {
            die('Error: ' . mysqli_error($con));
        }
    }

    /*
     *  definerReferenceupdate
     *  Funcion que define cual es la referencia que se preservara en la actualizacion de un elemento del inventario
     */

    public static function definerReferenceupdate($referencepreviouspost, $newreference) {
        $referenceupdate = '';
        if (empty($newreference)) {
            $referenceupdate = $referencepreviouspost;
        } else {
            $referenceupdate = $newreference;
        }
        return $referenceupdate;
    }

    /*
     *  updateEnergy_penderstable
     *  Funcion que actualiza la informacion de un registro del inventario vinculado a la tabla energy_spenders esta funcion se llama en el metodo updateInventorytable
     */

    public static function updateEnergy_penderstable($id_spendersupdatenew, $quantitypreviouspost, $newquantity) {
        $con = mdlconection::connect();
        $quantityupdate = mdlinventory::defineQuantityupdate($quantitypreviouspost, $newquantity);
        $updateintotableusers = "update energy_spenders set quantity = '$quantityupdate' where id_spenders = '$id_spendersupdatenew'";
        if (!mysqli_query($con, $updateintotableusers)) {
            die('Error: ' . mysqli_error($con));
        }
    }

    /*
     *  defineQuantityupdate
     *  Funcion que define la cantidad que se implementara en la actualizacion del registro de la tabla energy_spenders se llama en el metodo updateEnergy_penderstable
     */

    public static function defineQuantityupdate($quantitypreviouspost, $newquantity) {
        $quantityupdate = '';
        if (empty($newquantity)) {
            if ($newquantity == '0') {
                $quantityupdate = $newquantity;
            } else {
                $quantityupdate = $quantitypreviouspost;
            }
        } else {
            $quantityupdate = $newquantity;
        }
        return $quantityupdate;
    }

    /*
     *  defineStatusupdate
     *  Funcion que define el estado en el que se encontrara el registro del inventario
     */

    public static function defineStatusupdate($enabledpreviouspost, $newenable) {
        $statusdefine = '';
        if (empty($newenable)) {
            $statusdefine = $enabledpreviouspost;
        } else {
            $statusdefine = $newenable;
        }
        return $statusdefine;
    }

    /*
     *  defineStatusupdatetable
     *  Funcion que define el estado de la actualizacion de un registro del inventario
     */

    public static function defineStatusupdatetable($statusdefine) {
        $statusdefinetable = '';
        if ($statusdefine == '0' || $statusdefine == 'Deshabilitado') {
            $statusdefinetable = '0';
        } else {
            $statusdefinetable = '1';
        }
        return $statusdefinetable;
    }

}

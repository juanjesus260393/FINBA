<?php

/*
 *   proyecto FINBA
 *   Nombre: mdlsolarpanel
 *   Autor: Juan Jesus Garcia Centeno
 *   Fecha: 26-03-2011
 *   Versión: 1.0
 *   Descripcion: modelo en el que se establecen las funciones necesarias para la correcta administracion de los paneles
 *   solares registrados por un usuario.
 * 
 *   por Fabrica de Software, CIC-IPN
 */

//requieres adicionales debido a que algunas funciones ya han sido definidas para no tener que rehacerlas
require_once('mdlconection.php');
require_once("C:/xampp/htdocs/finbaproject/FINBA/resources/helpers/validations.php");
require_once("mdlinventory.php");

class mdlsolarpanel {

//Variables necesarias para la obtencion de la lista de los paneles registrados
    private $panels;
    private $dbh;

    public function __construct() {
        $this->dbh = mdlconection::connect();
    }

    /*
     *  getSolarpanels
     *  Funcion que se encarga de obtener los paneles registrados por el usuario que ha iniciado sesion
     */

    public function getSolarpanels() {
        session_start();
        $getpanels = "SELECT * FROM dbfinba.solar_panel p inner join dbfinba.nomenclature n on p.id_nomenclature = n.id_nomenclature "
                . "where n.school =  '" . $_SESSION['Schoolsname'] . "'";
        if (empty($this->dbh->query($getpanels))) {
            $this->panels[] = NULL;
        } else {
            foreach ($this->dbh->query($getpanels) as $panelsarray) {
                $this->panels[] = $panelsarray;
            }
        }
        return $this->panels;
    }

    /*
     *  insertPanel
     *  Funcion que envia la informacion obtenida de la vista agregar panel a cada subfuncion encargada del registro de dicha informacion
     */

    public static function insertPanel($panelname, $school, $building_number, $level, $orientation, $location, $reference, $registry_number) {
        $id_nomenclature = mdlsolarpanel::insertNomeclaturetable($school, $building_number, $level, $orientation, $location, $reference, $registry_number);
        $id_solar_panel = mdlsolarpanel::insertPaneltable($id_nomenclature, $panelname);
        if (empty($id_solar_panel) && empty($id_nomenclature)) {
            panelHelper::cantInsert();
        }
    }

    /*
     *  insertPaneltable
     *  funcion que crear un registro en la tabla solar_panel
     */

    public static function insertPaneltable($id_nomenclature, $panelname) {
        $con = mdlconection::connect();
        $id_solar_panel = validations::generateRamdonids();
        $username = validations::getUsername();
        $insertintotableusers = "INSERT INTO solar_panel(id_solar_panel,solar_panel_name,enabled,username,id_nomenclature)
        VALUES('$id_solar_panel','$panelname','1','$username','$id_nomenclature')";
        if (!mysqli_query($con, $insertintotableusers)) {
            die('Error: ' . mysqli_error($con));
        }
        return $id_solar_panel;
    }

    /*
     *  insertNomeclaturetable
     *  funcion que crear un registro en la nomeclatura
     */

    public static function insertNomeclaturetable($school, $building_number, $level, $orientation, $location, $reference, $registry_number) {
        $con = mdlconection::connect();
        $id_nomenclature = validations::generateRamdonids();
        $locationchar = inventoryhelper::defineLocation($location);
        $insertintotablenomenclature = "INSERT INTO nomenclature(id_nomenclature,school,building_number,level,orientation,location,reference,registry_number)
        VALUES('$id_nomenclature','$school','$building_number','$level','$orientation','$locationchar','$reference','$registry_number')";
        if (!mysqli_query($con, $insertintotablenomenclature)) {
            die('Error: ' . mysqli_error($con));
        }
        return $id_nomenclature;
    }

    /*
     *  updatePanel
     *  Funcion que se encarga de enviar la informacion que se actualizara de un registro de un panel solar
     */

    public static function updatePanel($updateidpanel, $updatenomenclature, $enabledpreviouspost, $referencepreviouspost, $newenable, $newreference) {
        echo $statusupdate = mdlsolarpanel::defineStatusupdate($enabledpreviouspost, $newenable);
        $referenceupdate = mdlinventory::definerReferenceupdate($referencepreviouspost, $newreference);
        mdlsolarpanel::updateNomeclaturetable($updatenomenclature, $referenceupdate);
        mdlsolarpanel::updatePaneltable($updateidpanel, $statusupdate);
    }

    /*
     *  updateNomeclaturetable
     *  Funcion que actualizar la referencia de la tabla nomeclatura
     */

    public static function updateNomeclaturetable($updatenomenclature, $referenceupdate) {
        $con = mdlconection::connect();
        $updateintotableusers = "update nomenclature set reference = '$referenceupdate' where id_nomenclature = '$updatenomenclature'";
        if (!mysqli_query($con, $updateintotableusers)) {
            die('Error: ' . mysqli_error($con));
        }
    }

    /*
     *  updatePaneltable
     *  Funcion que actualiza el estado de un panel en la tabla solar_panel
     */

    public static function updatePaneltable($updateidpanel, $statusupdate) {
        $con = mdlconection::connect();
        $updateintotableusers = "update solar_panel set enabled = '$statusupdate' where id_solar_panel = '$updateidpanel'";
        if (!mysqli_query($con, $updateintotableusers)) {
            die('Error: ' . mysqli_error($con));
        }
    }

    /*
     *  deletePanel
     *  funcion que verifica si un panel se encuentra habilitado, de ser asi evita que se elimine, en caso contrario procede
     *  a la eliminacion del registro de dicho panel
     */

    public static function deletePanel($id_solar_panel, $id_nomenclaturedelete, $status) {
        $definestatus = mdlsolarpanel::defineStatusdelete($status);
        if ($definestatus) {
            $con = mdlconection::connect();
            $deletenomenclature = "Delete from nomenclature where id_nomenclature = '" . $id_nomenclaturedelete . "'";
            $deletepanelsolar = "Delete from solar_panel where id_solar_panel = '" . $id_solar_panel . "'";
            if (!mysqli_query($con, $deletepanelsolar)) {
                die('Error: ' . mysqli_error($con));
            }
            if (!mysqli_query($con, $deletenomenclature)) {
                die('Error: ' . mysqli_error($con));
            }
        } else {
            inventoryhelper::isEnabled();
        }
    }

    /*
     *  defineStatusdelete
     *  funcion que determina al estatu de un panel solar que se quiere eliminar
     */

    public static function defineStatusdelete($status) {
        $statusdelete = '';
        if ($status == '1') {
            $statusdelete = false;
        }
        if ($status == '0') {
            $statusdelete = true;
        }
        return $statusdelete;
    }

    /*
     *  defineStatusupdate 
     *  funcion que define el status de un campo que se va actualizar.
     */

    public static function defineStatusupdate($enabledpreviouspost, $newenable) {
        $statusupdate = '';
        if (empty($newenable)) {
            $statusupdate = $enabledpreviouspost;
        }
        if ($newenable == 'Deshabilitado') {
            $statusupdate = '0';
        }
        if ($newenable == 'Habilitado') {
            $statusupdate = '1';
        }
        return $statusupdate;
    }

}

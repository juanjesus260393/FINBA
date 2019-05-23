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
    private $investor;
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
        $getpanels = "SELECT * FROM dbfinba.solar_panel s inner join dbfinba.solar_nomenclature n on
        s.id_solar_nomenclature=n.id_solar_nomenclature where n.school  =  '" . $_SESSION['Schoolsname'] . "'";
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
     *  getInvestor
     *  Funcion que se encarga de obtener los invesor registrados por cada escuela
     */

    public function getInvestor() {
        session_start();
        $getinvestor = "SELECT * FROM dbfinba.investor i inner join dbfinba.solar_nomenclature s 
        on i.id_sola_nomenclature = s.id_solar_nomenclature where s.school =  '" . $_SESSION['Schoolsname'] . "'";
        if (empty($this->dbh->query($getinvestor))) {
            $this->investor[] = NULL;
        } else {
            foreach ($this->dbh->query($getinvestor) as $investorarray) {
                $this->investor[] = $investorarray;
            }
        }
        return $this->investor;
    }

    /*
     *  getCountofpanel
     *  Funcion que se encarga de obtener los paneles asociados a un investor
     */

    public static function getCountofpanel($number_investore) {
        $con = mdlconection::connect();
        $countotal = "select count(s.id_solar_panel) as total from dbfinba.investor i inner join 
        dbfinba.solar_panel s on i.number_investor = s.number_investor where i.number_investor = '" . $number_investore . "'";
        $resultoftotal = mysqli_query($con, $countotal) or die(mysqli_error());
        $rowtotal = mysqli_fetch_array($resultoftotal);
        if (!$rowtotal[0]) {
            $total = true;
        } else {
            $total = FALSE;
        }
        return $total;
    }

    /*
     *  insertPanel
     *  Funcion que envia la informacion obtenida de la vista agregar panel a cada subfuncion encargada del registro de dicha informacion
     */

    public static function insertPanel($panelname, $number_panel, $number_investorp, $row, $id_image_panel, $school_investor, $location_investor, $number_build_solar) {
        $numberinvestor = mdlsolarpanel::getNumberofinvestor($number_investorp);
        if ($numberinvestor) {
            $numberpanel = mdlsolarpanel::getNumberofpanel($number_panel);
            if ($numberpanel) {
                panelHelper::cantInsert();
            } else {
                $numberbuild = mdlsolarpanel::getRowp($number_investorp);
                if (empty($number_build_solar)) {
                    $number_build_solar = '1';
                }
                if ($numberbuild == $number_build_solar) {
                    $newimage = mdlsolarpanel::uploadPanelimage($id_image_panel);
                    $id_nomenclature = mdlsolarpanel::insertNomeclaturetable($school_investor, $location_investor, $number_build_solar);
                    $id_solar_panel = mdlsolarpanel::insertPaneltable($panelname, $newimage, $number_panel, $row, $id_nomenclature, $number_investorp);
                    if (empty($id_solar_panel) && empty($id_nomenclature)) {
                        panelHelper::cantInsert();
                    }
                } else {
                    panelHelper::cantInsertpanel();
                }
            }
        } else {
            panelHelper::cantInsert();
        }
    }

    /*
     *  getRowp
     *  Funcion que otiene la fila del investor que se va a guardar 
     */

    public static function getRowp($number_investorp) {
        $con = mdlconection::connect();
        $searchinvestorrow = "SELECT n.number_build_solar FROM dbfinba.solar_nomenclature n inner join dbfinba.investor i 
            on n.id_solar_nomenclature = i.id_sola_nomenclature where i.number_investor  = '" . $number_investorp . "'";
        $resultofsearchinvestorrow = mysqli_query($con, $searchinvestorrow) or die(mysqli_error());
        $rowrow = mysqli_fetch_array($resultofsearchinvestorrow);
        if (!$rowrow[0]) {
            $row = $rowrow['number_build_solar'];
        } else {
            $row = $rowrow['number_build_solar'];
        }
        return $row;
    }

    /*
     *  getNumberofpanel
     *  Funcion que otiene el numero del panel para se utilizado en alguna validacion.
     */

    public static function getNumberofpanel($number_panel) {
        $con = mdlconection::connect();
        $searchinvestor = "SELECT * FROM dbfinba.solar_panel s where s.number_panel  = '" . $number_panel . "'";
        $resultofsearchinvestor = mysqli_query($con, $searchinvestor) or die(mysqli_error());
        $rowtotal = mysqli_fetch_array($resultofsearchinvestor);
        if (!$rowtotal[0]) {
            $total = FALSE;
        } else {
            $total = TRUE;
        }
        return $total;
    }

    /*
     *  getNumberofinvestor
     *  Funcion que obtiene el numero del investor que se va a registrar el cual sera utilizado para una validacion posterior
     */

    public static function getNumberofinvestor($number_investorp) {
        $con = mdlconection::connect();
        $searchinvestor = "SELECT * FROM dbfinba.investor i where i.number_investor  = '" . $number_investorp . "'";
        $resultofsearchinvestor = mysqli_query($con, $searchinvestor) or die(mysqli_error());
        $rowtotal = mysqli_fetch_array($resultofsearchinvestor);
        if (!$rowtotal[0]) {
            $total = FALSE;
        } else {
            $total = TRUE;
        }
        return $total;
    }

    /*
     *  insertInvestor
     *  Funcion realiza el registro de un inversor en las tablas especificadas
     */

    public static function insertInvestor($number_investor, $name_investor, $school_investor, $location_investor, $id_img_investor, $number_build_solar) {
        $con = mdlconection::connect();
        $number = mdlsolarpanel::numberExists($number_investor);
        if ($number) {
            $image = mdlsolarpanel::uploadIvestorimage($id_img_investor);
            $id_sola_nomenclature = mdlsolarpanel::insertNomeclaturesala($school_investor, $location_investor, $number_build_solar);
            $insertintotableinvestor = "INSERT INTO investor(number_investor,name_investor,id_img_investor,id_sola_nomenclature,enabled)
            VALUES('$number_investor','$name_investor','$image','$id_sola_nomenclature','1')";
            if (!mysqli_query($con, $insertintotableinvestor)) {
                die('Error: ' . mysqli_error($con));
            }
        } else {
            panelHelper::cantInsertinversor();
        }
    }

    /*
     *  numberExists
     *  funcion verifica que el numero de investor a registrar existe
     */

    public static function numberExists($number_investor) {
        $con = mdlconection::connect();
        $checknumberinvestor = "SELECT * FROM dbfinba.investor WHERE number_investor= '$number_investor'";
        $resultofchecknumberinvestor = mysqli_query($con, $checknumberinvestor) or die(mysqli_error());
        $rowone = mysqli_fetch_array($resultofchecknumberinvestor);
        if (!$rowone[0]) {
            $exist = true;
        } else {
            $exist = false;
        }
        return $exist;
    }

    /*
     *  insertNomeclaturesala
     *  funcion que crear un registro en la tabla de nomeclatura de los paneles solares
     */

    public static function insertNomeclaturesala($school_investor, $location_investor, $number_build_solar) {
        $con = mdlconection::connect();
        $id_solar_nomenclature = validations::generateRamdonids();
        $buildnumber = panelHelper::defineBuildnumber($number_build_solar);
        $location = panelHelper::defineLocation($location_investor);
        $insertintotablesolarnomenclature = "INSERT INTO solar_nomenclature(id_solar_nomenclature,number_build_solar,school,location)
        VALUES('$id_solar_nomenclature','$buildnumber','$school_investor','$location')";
        if (!mysqli_query($con, $insertintotablesolarnomenclature)) {
            die('Error: ' . mysqli_error($con));
        }
        return $id_solar_nomenclature;
    }

    /*
     *  uploadPanelimage
     *  funcion que almacena la imagen asociada a un panel en el servidor
     */

    public static function uploadPanelimage($id_image_panel) {
        if (empty($id_image_panel)) {
            $image_name_insert = "";
        } else {
            $identificadornuevaimagen = validations::generateRamdonids();
            $new_image_panel = $identificadornuevaimagen . ".jpg";
            move_uploaded_file($_FILES['id_image_panel']['tmp_name'], "C:/xampp/htdocs/finbaproject/FINBA/resources/img/paneles/$new_image_panel");
            $image_name_insert = $new_image_panel;
        }
        return $image_name_insert;
    }

    /*
     *  uploadIvestorimage
     *  funcion que almacena la informacion  de un investor en el servidor
     */

    public static function uploadIvestorimage($id_img_investor) {
        if (empty($id_img_investor)) {
            $image_name_insert = "";
        } else {
            $identificadornuevaimagen = validations::generateRamdonids();
            $new_image_panel = $identificadornuevaimagen . ".jpg";
            move_uploaded_file($_FILES['id_img_investor']['tmp_name'], "C:/xampp/htdocs/finbaproject/FINBA/resources/img/investores/$new_image_panel");
            $image_name_insert = $new_image_panel;
        }
        return $image_name_insert;
    }

    /*
     *  insertPaneltable
     *  funcion que crear un registro en la tabla solar_panel
     */

    public static function insertPaneltable($panelname, $newimage, $number_panel, $row, $id_nomenclature, $number_investorp) {
        $con = mdlconection::connect();
        $id_solar_panel = validations::generateRamdonids();
        $username = validations::getUsername();
        $insertintotableusers = "INSERT INTO dbfinba.solar_panel(id_solar_panel,solar_panel_name,enabled,username,id_image_panel,number_panel,rowp,id_solar_nomenclature,number_investor)
        VALUES('$id_solar_panel','$panelname','1','$username','$newimage','$number_panel','$row','$id_nomenclature','$number_investorp')";
        if (!mysqli_query($con, $insertintotableusers)) {
            die('Error: ' . mysqli_error($con));
        }
        return $id_solar_panel;
    }

    /*
     *  insertNomeclaturetable
     *  funcion que crear un registro en la nomeclatura
     */

    public static function insertNomeclaturetable($school_investor, $location_investor, $number_build_solar) {
        $con = mdlconection::connect();
        $id_nomenclature = validations::generateRamdonids();
        $buildnumber = panelHelper::defineBuildnumber($number_build_solar);
        $location = panelHelper::defineLocation($location_investor);
        $insertintotablenomenclature = "INSERT INTO dbfinba.solar_nomenclature(id_solar_nomenclature,number_build_solar,school,location)
        VALUES('$id_nomenclature','$buildnumber','$school_investor','$location')";
        if (!mysqli_query($con, $insertintotablenomenclature)) {
            die('Error: ' . mysqli_error($con));
        }
        return $id_nomenclature;
    }

    /*
     *  disabledPanel
     *  Funcion que desabilita un panel en especifico para su eliminacion
     */

    public static function disabledPanel($id_solar_panelu) {
        $con = mdlconection::connect();
        $updateintotableusers = "update solar_panel set enabled = '0' where id_solar_panel = '$id_solar_panelu'";
        if (!mysqli_query($con, $updateintotableusers)) {
            die('Error: ' . mysqli_error($con));
        }
    }

    /*
     *  disabledInvestor
     *  Funcion que se encarga de desabilitar el estado de un investor para su eliminacion
     */

    public static function disabledInvestor($number_investoru) {
        $con = mdlconection::connect();
        $updateintotableusers = "update investor set enabled = '0' where number_investor = '$number_investoru'";
        if (!mysqli_query($con, $updateintotableusers)) {
            die('Error: ' . mysqli_error($con));
        }
    }

    /*
     *  updatePanel
     *  Funcion que se encarga de enviar la informacion que se actualizara de un registro de un panel solar
     */

    public static function updatePanel($updateidpanel, $updatenomenclature, $enabledpreviouspost, $referencepreviouspost, $newenable, $newreference, $id_image_panel_new, $imagepreviouspost) {
        $name_image_update = mdlsolarpanel::determinateImageupdate($id_image_panel_new, $imagepreviouspost);
        $statusupdate = mdlsolarpanel::defineStatusupdate($enabledpreviouspost, $newenable);
        $referenceupdate = mdlinventory::definerReferenceupdate($referencepreviouspost, $newreference);
        mdlsolarpanel::updateNomeclaturetable($updatenomenclature, $referenceupdate);
        mdlsolarpanel::updatePaneltable($updateidpanel, $statusupdate, $name_image_update);
    }

    /*
     *  determinateImageupdate
     *  Funcion que determina el nombre de la imagen que sera registrado en la base de datos 
     * en el proceso previo a actualizar la informacion de un panel
     */

    public static function determinateImageupdate($id_image_panel_new, $imagepreviouspost) {
        $name_image_update = '';
        if (!empty($id_image_panel_new)) {
            $ruta = "C:/xampp/htdocs/finbaproject/FINBA/resources/img/paneles/";
            unlink($ruta . $imagepreviouspost);
            $identificadornuevaimagen = validations::generateRamdonids();
            $id_image_panel_new = $identificadornuevaimagen . ".jpg";
            move_uploaded_file($_FILES['id_image_panel_new']['tmp_name'], "C:/xampp/htdocs/finbaproject/FINBA/resources/img/paneles/$id_image_panel_new");
            $name_image_update = $id_image_panel_new;
        } else {
            $name_image_update = $imagepreviouspost;
        }
        return $name_image_update;
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

    public static function updatePaneltable($updateidpanel, $statusupdate, $name_image_update) {
        $con = mdlconection::connect();
        $updateintotableusers = "update solar_panel set enabled = '$statusupdate',id_image_panel = '$name_image_update' where id_solar_panel = '$updateidpanel'";
        if (!mysqli_query($con, $updateintotableusers)) {
            die('Error: ' . mysqli_error($con));
        }
    }

    /*
     *  deletePanel
     *  funcion que verifica si un panel se encuentra habilitado, de ser asi evita que se elimine, en caso contrario procede
     *  a la eliminacion del registro de dicho panel
     */

    public static function deletePanel($id_solar_panel, $id_nomenclaturedelete, $status, $image) {
        $definestatus = mdlsolarpanel::defineStatusdelete($status);
        if ($definestatus) {
            mdlsolarpanel::deleteImagepanel($image);
            $con = mdlconection::connect();
            $deletenomenclature = "Delete from solar_nomenclature where id_solar_nomenclature = '" . $id_nomenclaturedelete . "'";
            $deletepanelsolar = "Delete from solar_panel where id_solar_panel = '" . $id_solar_panel . "'";
            if (!mysqli_query($con, $deletepanelsolar)) {
                die('Error: ' . mysqli_error($con));
            }
            if (!mysqli_query($con, $deletenomenclature)) {
                die('Error: ' . mysqli_error($con));
            }
        } else {
            inventoryhelper::isEnableds();
        }
    }

    /*
     *  deleteInvestor
     *  funcion que veririca que un investor se encuentre desabilitado y que el numero de paneles asociados es cero para que 
     * elimina la informacion del inversor
     */

    public static function deleteInvestor($number_investore, $id_sola_nomenclature, $statusi, $imagei) {
        $definestatus = mdlsolarpanel::defineStatusdelete($statusi);
        if ($definestatus) {
            $total = mdlsolarpanel::getCountofpanel($number_investore);
            if ($total) {
                $con = mdlconection::connect();
                $deletenomenclature = "Delete from dbfinba.solar_nomenclature where id_solar_nomenclature = '" . $id_sola_nomenclature . "'";
                $deleteinvestor = "Delete from investor where number_investor = '" . $number_investore . "'";
                if (!mysqli_query($con, $deleteinvestor)) {
                    die('Error: ' . mysqli_error($con));
                }
                if (!mysqli_query($con, $deletenomenclature)) {
                    die('Error: ' . mysqli_error($con));
                }
                mdlsolarpanel::deleteImageinversor($imagei);
            } else {
                panelHelper::canDelete();
            }
        } else {
            inventoryhelper::isEnableds();
        }
    }

    /*
     *  deleteImagepanel
     *  funcion que elimina la imagen relacionada a un panel.
     */

    public static function deleteImagepanel($image) {
        if (!empty($image)) {
            $ruta = "C:/xampp/htdocs/finbaproject/FINBA/resources/img/paneles/";
            unlink($ruta . $image);
        }
    }

    /*
     *  deleteImageinversor
     *  funcion que elimina la imagen relacionada a un investor
     */

    public static function deleteImageinversor($imagei) {
        if (!empty($imagei)) {
            $ruta = "C:/xampp/htdocs/finbaproject/FINBA/resources/img/investores/";
            unlink($ruta . $imagei);
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

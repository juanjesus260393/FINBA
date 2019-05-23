<?php

/*
 *   proyecto FINBA
 *   Nombre: validations
 *   Autor: Juan Jesus Garcia Centeno
 *   Fecha: 19-03-2011
 *   Versión: 1.0
 *   Descripcion: modelo en el que se establecen las funciones necesarias para la correcta administracion de los elementos del inventario.
 * 
 *   por Fabrica de Software, CIC-IPN
 */

//Requieres adiionales
require_once('C:/xampp/htdocs/finbaproject/FINBA/models/mdlconection.php');
require_once("C:/xampp/htdocs/finbaproject/FINBA/models/mdlauth.php");

class validations {
    /*
     *  loginVoid
     *  funcion que valida que la informacion proporcionada por el usuario no se encuentre vacia
     */

    public static function loginVoid($username, $password) {
        $userinformation = true;
        if (empty($username) && empty($password)) {
            $userinformation = FALSE;
        } else {
            $userinformation = TRUE;
        }
        return $userinformation;
    }

    /*
     *  getUsername
     *  Funcion que se encarga de obtener el nombre de usuario en base al token con el que se inicio sesion
     */

    public static function getUsername() {
        session_start();
        $con = mdlconection::connect();
        $checkuser = "SELECT u.username FROM users u inner join token t on u.idtoken = t.idtoken where t.token ='" . $_SESSION['token'] . "'";
        $resultofcheckuser = mysqli_query($con, $checkuser) or die(mysqli_error());
        $rowusername = mysqli_fetch_array($resultofcheckuser);
        if (!$rowusername[0]) {
            Mdlauth::Logout();
        } else {
            $username = $rowusername['username'];
        }
        return $username;
    }

    /*
     *  generateRamdonids
     *  Funcion que genera identificadores aleatorios para los registros de la base de datos.
     */

    public static function generateRamdonids() {
        $rango = 9;
        $longitud = $rango;
        $id = '';
        $pattern = '1234567890';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $longitud; $i++) {
            $id .= $pattern{mt_rand(0, $max)};
        }
        return $id;
    }

}

/*
 *   proyecto FINBA
 *   Nombre: inventoryhelper
 *   Autor: Juan Jesus Garcia Centeno
 *   Fecha: 19-03-2011
 *   Versión: 1.0
 *   Descripcion: modelo en el que se establecen las funciones necesarias para la correcta administracion de los elementos del inventario.
 * 
 *   por Fabrica de Software, CIC-IPN
 */

class inventoryhelper {
    /*
     *  validationInsertinventory
     *  Funcion que validad que la informacion que se ingresara en el registro de un elemento del inventario no se encuentre vacia 
     */

    public static function validationInsertinventory($quantity, $elementname, $reference, $registry_number) {
        if (empty($quantity) || empty($elementname) || empty($reference) || empty($registry_number)) {
            inventoryhelper::dataVoid();
        } else {
            if (ctype_space($quantity) || strlen(trim($elementname)) == 0) {
                inventoryhelper::dataVoid();
            } else {
                return true;
            }
        }
    }

    /*
     *  validationDeleteinventory
     *  Funcion encargada de validar que el estado y cantidad de elementos del inventario sean los propocios para su eliminacion
     */

    public static function validationDeleteinventory($status, $cantidad) {
        $isokdelete = inventoryhelper::statusDelete($status);
        if ($isokdelete) {
            inventoryhelper::isEnabled();
        } else {
            $quantityok = inventoryhelper::quantityDelete($cantidad);
            if ($quantityok) {
                $candelete = TRUE;
            } else {
                inventoryhelper::quantityDiferrentcero();
            }
        }
        return $candelete;
    }

    /*
     *  statusDelete
     *  Funcion que determinar si el estado se puede eliminar
     */

    public static function statusDelete($status) {
        $isokdelete = false;
        if ($status) {
            $isokdelete = true;
        } else {
            $isokdelete = false;
        }
        return $isokdelete;
    }

    /*
     *  quantityDelete
     *  Funcion que determinar si la cantidad de elemetos a eliminar
     */

    public static function quantityDelete($cantidad) {
        $quantityok = false;
        if ($cantidad == '0') {
            $quantityok = true;
        } else {
            $quantityok = false;
        }
        return $quantityok;
    }

    /*
     *  quantityDiferrentcero
     *  Funcion que envia alerta si la cantidad es cero para que no se elimine
     */

    public static function quantityDiferrentcero() {
        echo '<script language = javascript>
	alert("La cantidad tiene que ser cero para poder eliminarse")
           self.location = "../controllers/crtinventory.php"
	</script>';
    }

    /*
     *  isEnabled
     *  Funcion que enviar alerta si el elemento se encuentra habilitado
     */

    public static function isEnabled() {
        echo '<script language = javascript>
	alert("El elemento se encuentra habilitado no puede eliminarse")
           self.location = "../controllers/crtinventory.php"
	</script>';
    }

    /*
     *  isEnableds
     *  Funcion que enviar alerta si el elemento se encuentra habilitado
     */

    public static function isEnableds() {
        echo '<script language = javascript>
	alert("El elemento se encuentra habilitado no puede eliminarse")
           self.location = "../controllers/crtsolarpanels.php"
	</script>';
    }

    /*
     *  dataVoid
     *  Funcion que envia alerta en caso de que algun dato se encuentre vacio
     */

    public static function dataVoid() {
        echo '<script language = javascript>
	alert("Algun dato se encuentra vacio")
           self.location = "../views/vwmenuprincipal.php"
	</script>';
    }

    /*
     *  numberCero
     *  Funcion que envia alerta en caso de que se ingrese un numero cero para el registro de un elemento del inventario
     */

    public static function numberCero() {
        echo '<script language = javascript> alert("No puedes ingresar cantidades con cero") </script>';
        echo "<html><head></head>" .
        "<body onload=\"javascript:history.back()\">" .
        "</body></html>";
        exit();
    }

    /*
     *  cantDelete
     *  Funcion que envia alerta en caso de que un elemento se quiera eliminar pero no cumpla
     *  con las caracteristicas necesarias y envia al usuario a la pagina principal.
     */

    public static function cantDelete() {
        echo '<script language = javascript>
	alert("No se puede eliminar este Objeto")
           self.location = "../views/vwmenuprincipal.php"
	</script>';
    }

    /*
     *  defineLocation
     *  Funcion que define al usuario el tipo de caracter a ingresar en la base de datos
     */

    public static function defineLocation($location) {
        $locationdefine = '';
        if ($location == 'INTERIOR') {
            $locationdefine = 'I';
        }
        if ($location == 'EXTERIOR') {
            $locationdefine = 'E';
        }
        return $locationdefine;
    }

}

/*
 *   proyecto FINBA
 *   Nombre: panelHelper
 *   Autor: Juan Jesus Garcia Centeno
 *   Fecha: 26-03-2011
 *   Versión: 1.0
 *   Descripcion: clase  en la que se definen funciones auxiliares para la administracion de los paneles
 * 
 *   por Fabrica de Software, CIC-IPN
 */

class panelHelper {
    /*
     *  validateInformationpanels
     *  funcion que valida si el numero de registro que se esta agregando esta vacio
     */

    public static function validateInformationpanels($registry_number) {
        $validation = FALSE;
        if (empty($registry_number)) {
            inventoryhelper::dataVoid();
        } else {
            $validation = TRUE;
        }
        return $validation;
    }

    /*
     *  cantInsert
     *  funcion que envia una alerta al usuario en caso de que un elemento no se pueda registrar
     */

    public static function cantInsert() {
        echo '<script language = javascript>
	alert("No se puede insertar este elemento")
	</script>';
        echo '<script language = javascript>
	self.location = "../controllers/crtsolarpanels.php"
	</script>';
    }

    /*
     *  cantInsertinversor
     *  funcion que envia una alerta para que no se pueda agregar un investor
     */

    public static function cantInsertinversor() {
        echo '<script language = javascript>
	alert("No se puede agregar este inversor")
           	</script>';
        echo "<html><head></head>" .
        "<body onload=\"javascript:history.back()\">" .
        "</body></html>";
    }
    
      /*
     *  cantInsertpanel
     *  funcion que envia una alerta para que no se pueda agregar un investor
     */

    public static function cantInsertpanel() {
        echo '<script language = javascript>
	alert("El edificio del panel no es igual al del inversor")
           	</script>';
        echo '<script language = javascript>
	self.location = "../controllers/crtsolarpanels.php"
	</script>';
    }

    /*
     *  canDelete
     *  funcion que envia una alerta al usuario en caso de que un inversor no se pueda eliminar
     */

    public static function canDelete() {
        echo '<script language = javascript>
	alert("No se puede eliminar este inversor")
           	</script>';
        echo "<html><head></head>" .
        "<body onload=\"javascript:history.back()\">" .
        "</body></html>";
    }

    /*
     *  defineBuildnumber
     *  funcion que define el numero de edificio
     */

    public static function defineBuildnumber($number_build_solar) {
        $buildnumber = '';
        if (empty($number_build_solar)) {
            $buildnumber = '1';
        }
        if (!empty($number_build_solar)) {
            $buildnumber = $number_build_solar;
        }
        return $buildnumber;
    }

    /*
     *  defineLocation
     *  funcion que define la localizacion de un investor ya sea techo o estacionamiento
     */

    public static function defineLocation($location_investor) {
        $location = '';
        if (empty($location_investor)) {
            $location = 'techo';
        }
        if (!empty($location_investor)) {
            $location = $location_investor;
        }
        return $location;
    }

}

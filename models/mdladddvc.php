<?php

/**
 *  proyecto FINBA
 *   Nombre: vwadddevice
 *   Autor: Isidro Delgado Murillo
 *   Fecha: 13-03-2019
 *   Versión: 1.0
 *   Descripcion: Modelo donde se definen las funciones para manejo y control de dispositivos
 *   asi como sus interacciones con la base de datos
 *   por Fabrica de Software, CIC-IPN
 **/

session_start();

class mdladddvc {

    private $dbh;
    private $mac;
    private $a;

    public function __construct() {
        $this->dbh = mdlconection::connect();
    }
/**
 * Funcion para registrar un dispositivo nuevo
 * @param type $Nom
 */
    public function insertDevice($Nom) {
        $dbh1 = mdlconection::connect();
        $namedvc = filter_input(INPUT_POST, 'namedvc');
        $dvcmac1 = filter_input(INPUT_POST, 'dvcmac1');
        $dvcmac2 = filter_input(INPUT_POST, 'dvcmac2');
        $dvcmac3 = filter_input(INPUT_POST, 'dvcmac3');
        $dvcmac4 = filter_input(INPUT_POST, 'dvcmac4');
        $dvcmac5 = filter_input(INPUT_POST, 'dvcmac5');
        $dvcmac6 = filter_input(INPUT_POST, 'dvcmac6');
        $tipodvc = filter_input(INPUT_POST, 'tipo');

        $this->mac = $dvcmac1 . ':' . $dvcmac2 . ':' . $dvcmac3 . ':' . $dvcmac4 . ':' . $dvcmac5 . ':' . $dvcmac6;
        $user = $this->registredBy();
        $yaexiste = $this->yaexiste();
        if ($yaexiste == 0) {

            $queryinsertDvc = "INSERT INTO device_finba (id_device_finba, device_name_finba, enabled, username, type_device, id_nomenclature) "
                    . "VALUES('" . $this->mac . "', '" . $namedvc . "', 1, '" . $user . "', '" . $tipodvc . "', '" . $Nom . "');";
            $resultado = $dbh1->query($queryinsertDvc);
            if($resultado){
                echo '<script language = javascript>
            alert("El dispositivo esta correctamente registrado");
	self.location = "../controllers/crtadddvc.php"
	</script>';
            }else{
                $this->ErrorInsert($Nom);
            }
        } else {
            echo '<script language = javascript>
            alert("El dispositivo con esa Mac ya esta registrado");
	self.location = "../controllers/crtadddvc.php"
	</script>';
        }
    }
/**
 * Consulta y regresa el nombre de usuario que realiza la operación 
 * @return type String
 */
    public function registredBy() {
        $dbh3 = mdlconection::connect();

        $queryBuscar = "SELECT U.username FROM users U INNER JOIN token T ON U.idtoken=T.idtoken WHERE T.token='" . $_SESSION['token'] . "';";
        if ($res = $dbh3->query($queryBuscar)) {
            /* obtener el array de objetos */
            $usr = $res->fetch_row();
            /* liberar el conjunto de resultados */
            $res->close();
        }
        /* cerrar la conexión */
        $dbh3->close();
        return $usr[0];
    }
/**
 * Funcion que en caso de haber un error en el registro del dispositivo, 
 * deshace los cambios ya realizados en la base de Datos
 * @param type $NomBorrar int
 */
    public function ErrorInsert($NomBorrar){
        $dbhError= mdlconection::connect();
        $queryError="DELETE FROM nomenclature WHERE id_nomenclature='".$NomBorrar."'";
        $resBorrar=$dbhError->query($queryError);
       if($resBorrar){
         echo '<script language = javascript>
            alert("Error al Registrar el Dispositivo, intente de nuevo");
	self.location = "../controllers/crtadddvc.php"
       </script>';}
       else{
    $this->ErrorInsert($NomBorrar);
       }
    }
/**
 * Funcion que registra la ubicacion del dispositivo previamente a registrar
 * los datos del mismo
 */
    public function insertNomenclatura() {
        $dbhNom = mdlconection::connect();
        $z = random_bytes(3);
        $y = hexdec(bin2hex($z));
        $yaestaentabla = $this->yaexisteNomen($y);
        if ($yaestaentabla == 0) {
        $Nom1 = filter_input(INPUT_POST, 'dos');
        $Nom2 = filter_input(INPUT_POST, 'tres');
        $Nom3 = filter_input(INPUT_POST, 'cuatro');
        $Nom4 = substr(filter_input(INPUT_POST, 'cinco'), 0);
        $Nom5 = substr(filter_input(INPUT_POST, 'seis'), 0);
        $Nom6 = filter_input(INPUT_POST, 'siete');
        $Nom7 =  filter_input(INPUT_POST, 'ocho');
            $queryinsertnomen = "INSERT INTO nomenclature (id_nomenclature, school, building_number, level, orientation, location, reference, registry_number)"
                    . " VALUES (" . $y . ", '".$Nom1."', '".$Nom2."', '".$Nom3."', '".$Nom4."', '".$Nom5."', '".$Nom6."', ".$Nom7.")";
            $queryRes = $dbhNom->query($queryinsertnomen);
            if ($queryRes) {
                $this->insertDevice($y);
                $queryRes->close();
            }$dbhNom->close();
        }
    }
/**
 * Funcion que verifica si el valor aleatorio generado 
 * para el registro de la ubicacion no esta ocupado
 * @param type $bscr int
 * @return type int
 */
    public function yaexisteNomen($bscr) {
        $dbh4 = mdlconection::connect();
        $queryYaexiste2 = "SELECT*FROM nomenclature WHERE id_nomenclature='" . $bscr . "';";
        $resultado = $dbh4->query($queryYaexiste2);
        return mysqli_affected_rows($dbh4);
        $dbh4->close();
    }
/**
 * Funcion que verifica si el dispositivo ya esta registrado en la base de datos
 * @return type int
 */
    public function yaexiste() {
        $dbh2 = mdlconection::connect();

        $queryYaexiste = "SELECT*FROM device_finba WHERE id_device_finba='" . $this->mac . "';";

        $resultado = $dbh2->query($queryYaexiste);


        return mysqli_affected_rows($dbh2);
        $dbh2->close();
    }
    
    

}

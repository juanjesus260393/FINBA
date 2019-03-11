<?php

/*
 *   proyecto FINBA
 *   Nombre: mdlinventory
 *   Autor: Juan Jesus Garcia Centeno
 *   Fecha: 08-03-2011
 *   Versión: 1.0
 *   Descripcion: modelo en el que se establecen las funciones necesarias para la correcta administracion de los usuarios.
 * 
 *   por Fabrica de Software, CIC-IPN
 */

//Modelos adicionales que requiere el archivo, dado que algunas funciones se encuentran en dichos archivos
require_once('mdlconection.php');

//require_once("C:/xampp/htdocs/finbaproject/FINBA/models/mdlauth.php");
// Evitar Notificar todos los errores de PHP
//error_reporting(0);

class mdlinventory {

    private $inventory;
    private $dbh;

    public function __construct() {
        $this->dbh = mdlconection::connect();
    }

    public function getinventory() {
        $checkusers = "SELECT i.enabled,i.quantity, e.spender_name FROM inventory i "
                . "inner join energy_spenders e on i.id_spenders = e.id_spenders";
        if (empty($this->dbh->query($checkusers))) {
            $this->inventory[] = NULL;
        } else {
            foreach ($this->dbh->query($checkusers) as $usersarray) {
                $this->inventory[] = $usersarray;
            }
        }
        return $this->inventory;
    }

}

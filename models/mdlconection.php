<?php

/*
 *   proyecto FINBA
 *   Nombre: mdlconection
 *   Autor: Juan Jesus Garcia Centeno
 *   Fecha: 08-03-2011
 *   Versión: 1.0
 *   Descripcion: modelo en el que se configura la coneccion con la base de datos, para ser usada en donde se requiere
 * 
 *   por Fabrica de Software, CIC-IPN
 */

class mdlconection {
    
    /*
     *  connect
     *  funcion que establece la coneccion con la base de datos en base a las credenciales proporcionadas.
     */

    public static function connect() {
        $conexion = mysqli_connect("localhost", "root", "P4SSW0RD", "dbfinba");
        return $conexion;
    }
    
    public static function connectSeeds() {
        $conexion = mysqli_connect("148.204.63.238", "root", "BD.S33d5", "ipn");
        return $conexion;
    }

}

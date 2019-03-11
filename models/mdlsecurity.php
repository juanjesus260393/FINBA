<?php

/*
 *   proyecto FINBA
 *   Nombre: mdlsecurity
 *   Autor: Juan Jesus Garcia Centeno
 *   Fecha: 08-03-2011
 *   Versión: 1.0
 *   Descripcion: modelo en el que se establecen las funciones que se requieren para el inicio de seion,
 *   y cualquier funcion adicional a fin de obtener un mejor rendimiento del codigo
 * 
 *   por Fabrica de Software, CIC-IPN
 */

//Modelos adicionales que requiere el archivo, dado que en algunas casos llama funciones especificas
require_once('C:/xampp/htdocs/finbaproject/FINBA/models/mdlconection.php');
require_once('C:/xampp/htdocs/finbaproject/FINBA/models/mdlauth.php');

class mdlsecurity {
    /*
     *  validationSecurity
     *  funcion que verifica si el metodo por el cual se accede es diferente a post y get para eliminar la sesion y salir de la pagina
     */

    public static function validationSecurity() {
        if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') !== 'POST' && filter_input(INPUT_SERVER, 'REQUEST_METHOD') !== 'GET') {
            header("HTTP/1.0 405 Method Not Allowed");
            session_destroy();
            exit();
        } else {
            mdlsecurity::userExist();
        }
    }

    /*
     *  userExist
     *  funcion que verifica si el usuario existe para esto se verifica si la session del usuario esta activa, si es asi se elimna la sesion
     *  y se regresa a la pagina de inicio en caso contrario se realza el mismo procedimiento.
     */

    public static function userExist() {
        if (isset($_SESSION['token']) && $_SESSION['loggedin'] = TRUE) {
            unset($_SESSION);
            session_destroy();
            echo '<script language = javascript>    
	self.location = "../index.php"
	</script>';
        } else {
            unset($_SESSION);
            session_destroy();
            echo '<script language = javascript>    
	self.location = "../index.php"
	</script>';
        }
    }

    public static function validateToken() {
        if (!isset($_SESSION['token'])) {
            unset($_SESSION);
            session_destroy();
            echo '<script language = javascript>    
	self.location = "../index.php"
	</script>';
        }
    }

}

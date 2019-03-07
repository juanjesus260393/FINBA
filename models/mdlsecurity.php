<?php

require_once('../models/mdlconection.php');
require_once('../models/mdlauth.php');

class mdlsecurity {

    public static function validationSecurity() {
        if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') !== 'POST' && filter_input(INPUT_SERVER, 'REQUEST_METHOD') !== 'GET') {
            header("HTTP/1.0 405 Method Not Allowed");
            session_destroy();
            exit();
        } else {
            mdlsecurity::userExist();
        }
    }

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

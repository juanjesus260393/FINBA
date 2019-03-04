<?php

require_once('../models/mdlconection.php');

class mdlsecurity {

    public static function validationSecurity() {
        if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') !== 'POST' && filter_input(INPUT_SERVER, 'REQUEST_METHOD') !== 'GET') {
            header("HTTP/1.0 405 Method Not Allowed");
            exit();
        } else {
            mdlsecurity::userExist();
        }
    }

    public static function userExist() {
        if (isset($_SESSION['token'])) {
            echo '<script language = javascript>    
	self.location = "../index.php"
	</script>';
            exit();
        }
    }
public static function validationViews() {
        $con = mdlconection::connect();
        $checkuser = "SELECT f.type_user FROM token t inner join users u on t.idtoken =u.idtoken inner join
            type_users f on u.id_type_user =  f.id_type_user where t.token ='" . $_SESSION['token'] . "'";
        $resultofcheckuser = mysqli_query($con, $checkuser) or die(mysqli_error());
        $rowtypeofuser = mysqli_fetch_array($resultofcheckuser);
        if (!$rowtypeofuser [0]) {
            echo '<script language = javascript>
	alert("El usuario no se encuenta registrado")
           self.location = "../index.php"
	</script>';
            exit;
        } 
    }
}

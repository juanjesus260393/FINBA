<?php

require_once('mdlconection.php');

class mdlusers {

    public static function getUsers($token) {
        
    }

    public static function searchUsers($token) {
        $con = mdlconection::connect();
        $checkuser = "SELECT * FROM users WHERE username='" . $username . "'";
        $resultofcheckuser = mysqli_query($con, $checkuser) or die(mysqli_error());
        $rowone = mysqli_fetch_array($resultofcheckuser);
        if (!$rowone[0]) {
            echo '<script language = javascript>
	alert("no se encuentran usuarios registrados")
           self.location = "../index.php"
	</script>';
        } else {
            $exist = true;
        }
        return $exist;
    }

}

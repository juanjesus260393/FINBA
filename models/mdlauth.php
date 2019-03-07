<?php

require_once('mdlconection.php');
require_once("../models/mdlsecurity.php");
require_once("../models/mdlusers.php");

class Mdlauth {

    public static function Login($username, $password) {
        $userexist = Mdlauth::userExists($username);
        if ($userexist) {
            $validatetokendb = Mdlauth::validatePassword($username, $password);
            $_SESSION['token'] = $validatetokendb;
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['token'];
            echo '<script language = javascript>
                	alert(' . $_SESSION['token'] . '); 
		</script>';
        } else {
            $validatetokendb = null;
        }
    }

    public static function Logout() {
        unset($_SESSION);
        session_destroy();
        echo '<script language = javascript>    
	self.location = "../index.php"
	</script>';
        exit();
    }

    public static function changedPassword($newpassword) {
        $encrypetdpass = mdlusers::generatePassword($newpassword);
        $usernamedb = Mdlauth::searchPass();
        if (!empty($usernamedb) && !empty($encrypetdpass)) {
            Mdlauth::updatePass($usernamedb, $encrypetdpass);
        } else {
            Mdlauth::Logout();
        }
    }

    public static function searchPass() {
        $con = mdlconection::connect();
        $checkuser = "SELECT u.username FROM token t inner join users u on t.idtoken =u.idtoken inner join
            type_users f on u.id_type_user =  f.id_type_user where t.token ='" . $_SESSION['token'] . "'";
        $resultofcheckuser = mysqli_query($con, $checkuser) or die(mysqli_error());
        $rowone = mysqli_fetch_array($resultofcheckuser);
        if (!$rowone[0]) {
            echo '<script language = javascript>
	alert("El usuario no se encuenta registrado")
           self.location = "../index.php"
	</script>';
        } else {
            $passdb = $rowone['username'];
        }
        return $passdb;
    }

    public static function updatePass($usernamedb, $encrypetdpass) {
        $con = mdlconection::connect();
        $updateintotableusers = "update users set password = '$encrypetdpass' where username = '$usernamedb'";
        if (!mysqli_query($con, $updateintotableusers)) {
            Mdlauth::Logout();
        }
    }

    public static function userExists($username) {
        $con = mdlconection::connect();
        $checkuser = "SELECT * FROM users WHERE username='" . $username . "'";
        $resultofcheckuser = mysqli_query($con, $checkuser) or die(mysqli_error());
        $rowone = mysqli_fetch_array($resultofcheckuser);
        if (!$rowone[0]) {
            echo '<script language = javascript>
	alert("El usuario no se encuenta registrado")
           self.location = "../index.php"
	</script>';
        } else {
            $exist = true;
        }
        return $exist;
    }

    public static function validatePassword($username, $password) {
        $getpassword = Mdlauth::searchPassword($username);
        if (password_verify($password, $getpassword)) {
            $tokendb = Mdlauth::searchToken($username);
            $validatetokendb = Mdlauth::generateUsertoken($username, $password, $tokendb);
        } else {
            $validatetokendb = NULL;
        }
        return $validatetokendb;
    }

    public static function generateUsertoken($username, $password, $tokendb) {
        $clave = '391aa86cfb1bfadcb185476cd0f4b203174479c90090780528ffd4b55605f45c';
        $HASHCLIENTE = $username . "|" . $password . "|" . $clave . "|" . $tokendb;
        $hashscliente = hash('sha256', $HASHCLIENTE);
        $hashbd = hash('sha256', $HASHCLIENTE);
        if ($hashscliente == $hashbd) {
            
        } else {
            echo '<script language = javascript>
	alert("El usuario no es confiable")
           self.location = "../index.php"
	</script>';
        }
        return $tokendb;
    }

    public static function searchPassword($username) {
        $con = mdlconection::connect();
        $searchpass = "SELECT password FROM users WHERE username='" . $username . "'";
        $resultofsearchpass = mysqli_query($con, $searchpass) or die(mysqli_error());
        $rowtwo = mysqli_fetch_array($resultofsearchpass);
        if (!$rowtwo[0]) {
            echo '<script language = javascript>
	alert("El usuario no se encuenta registrado")
           self.location = "../index.php"
	</script>';
        } else {
            $passdb = $rowtwo['password'];
        }
        return $passdb;
    }

    public static function searchIdtoken($username) {
        $con = mdlconection::connect();
        $searchpass = "select u.idtoken from users u where u.username ='" . $username . "'";
        $resultofsearchpass = mysqli_query($con, $searchpass) or die(mysqli_error());
        $rowtwo = mysqli_fetch_array($resultofsearchpass);
        if (!$rowtwo[0]) {
            echo '<script language = javascript>
	alert("El token no existe")
           self.location = "../index.php"
	</script>';
        } else {
            $idtokendb = $rowtwo['idtoken'];
        }
        return $idtokendb;
    }

    public static function searchToken($username) {
        $con = mdlconection::connect();
        $dbidtoken = Mdlauth::searchIdtoken($username);
        $searchtoken = "select t.token from dbfinba.users u inner join dbfinba.token t on
        u.idtoken=t.idtoken where t.idtoken =" . $dbidtoken . "";
        $resultofsearchtoken = mysqli_query($con, $searchtoken) or die(mysqli_error());
        $rowthree = mysqli_fetch_array($resultofsearchtoken);
        if (!$rowthree[0]) {
            echo '<script language = javascript>
	alert("El usuario no es confiable")
           self.location = "../index.php"
	</script>';
        } else {
            $tokendb = $rowthree['token'];
        }
        return $tokendb;
    }

}

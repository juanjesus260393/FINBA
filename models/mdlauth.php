<?php

require_once('mdlconection.php');

class Mdlauth {

    public static function Login($username, $password) {
        $userexist = Mdlauth::userExists($username);
        if ($userexist) {
            $validatetokendb = Mdlauth::validatePassword($username, $password);
            $_SESSION['token'] = $validatetokendb;
        } else {
            $validatetokendb = null;
        }
    }

    public static function Logout() {
        echo 'Estas entrando a la funcion logout';
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

    public static function searchToken($username) {
        $con = mdlconection::connect();
        $searchtoken = "SELECT t.token FROM token t inner join users u  on u.username = t.username where t.username ='" . $username . "'";
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

<?php

session_start();
require_once('mdlconection.php');

class mdlusers {

    private $users;
    private $dbh;

    public function __construct() {
        $this->dbh = mdlconection::connect();
    }

    public function getUsers() {
        $checkusers = "SELECT u.username, t.type_user FROM users u inner join type_users t on u.id_type_user = t.id_type_user
            inner join token k on u.idtoken = k.idtoken where t.type_user = 'Employee' and k.token <>'" . $_SESSION['token'] . "'";
        if (empty($this->dbh->query($checkusers))) {
            $this->users[] = NULL;
        } else {
            foreach ($this->dbh->query($checkusers) as $usersarray) {
                $this->users[] = $usersarray;
            }
        }
        return $this->users;
    }

    public static function insertUser($username, $password, $type_user) {
        mdlusers::validateUserdates($username, $password, $type_user);
    }

    public static function updateUser($usernameforupdate, $usertypeprevious, $newtype_user) {
        mdlusers::verifyTypeofuser($usernameforupdate, $usertypeprevious, $newtype_user);
    }

    public static function verifyTypeofuser($usernameforupdate, $usertypeprevious, $newtype_user) {
        if ($usertypeprevious == 'Administrador') {
            echo '<script language = javascript> alert("Solo se pueden modificar los usuarios de tipo empleado") </script>';
            //Regresamos a la pagina anterior
            echo "<html><head></head>" .
            "<body onload=\"javascript:history.back()\">" .
            "</body></html>";
            exit;
        } else {
            mdlusers::updateIntousers($usernameforupdate, $newtype_user);
        }
    }

    public static function updateIntousers($usernameforupdate, $newtype_user) {
        $con = mdlconection::connect();
        $newtypeuserdb = mdlusers::defineTypeuser($newtype_user);
        $updateintotableusers = "update users set id_type_user = '$newtypeuserdb' where username = '$usernameforupdate'";
        if (!mysqli_query($con, $updateintotableusers)) {
            die('Error: ' . mysqli_error($con));
        }
    }

    public static function deleteUser($delete_username) {
        $type_user = mdlusers::isAdministrator();
        if ($type_user == 'Administrator') {
            mdlusers::deleteUseroftable($delete_username);
        } else {
            echo '<script language = javascript> alert("Solo los administradores pueden eliminar usuarios") </script>';
            //Regresamos a la pagina anterior
            echo "<html><head></head>" .
            "<body onload=\"javascript:history.back()\">" .
            "</body></html>";
            exit;
        }
    }

    public static function deleteUseroftable($delete_username) {
        $con = mdlconection::connect();
        $idtoken = mdlusers::getTokenid($delete_username);
        $deletetoken = "Delete from users where username = '" . $delete_username . "'";
        $deleteuser = "Delete from token where idtoken = " . $idtoken . "";
        if (!mysqli_query($con, $deletetoken)) {
            die('Error: ' . mysqli_error($con));
        }
        if (!mysqli_query($con, $deleteuser)) {
            die('Error: ' . mysqli_error($con));
        }
    }

    public static function getTokenid($delete_username) {
        $con = mdlconection::connect();
        $checkuser = "SELECT u.idtoken FROM users u where username  ='" . $delete_username . "'";
        $resultofcheckuser = mysqli_query($con, $checkuser) or die(mysqli_error());
        $rowtypeofuser = mysqli_fetch_array($resultofcheckuser);
        if (!$rowtypeofuser [0]) {
            
        } else {
            $idtoken = $rowtypeofuser['idtoken'];
        }
        return $idtoken;
    }

    public static function isAdministrator() {
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
        } else {
            $type_user = $rowtypeofuser['type_user'];
        }
        return $type_user;
    }

    public static function verifyIfisadministrator() {
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
        } else {
            $type_user = $rowtypeofuser['type_user'];
            mdlusers::isNotadministrator($type_user);
        }
    }

    public static function isNotadministrator($type_user) {
        if ($type_user == 'administrator') {
            //nothing
        }
        if ($type_user == 'Employee') {
            echo '<script language = javascript>
	alert("El usuario no se encuenta registrado")
           self.location = "../views/vwmenuprincipal.php"
	</script>';
        }
    }

    public static function validateUserdates($username, $password, $type_user) {
        $userdata = mdlusers::validateUsername($username, $password);
        if ($userdata) {
            $userdataexist = mdlusers::userDateexist($username);
            if ($userdataexist) {
                mdlusers::insertIntousers($username, $password, $type_user);
            } else {
                mdlusers::wrongData();
            }
        }
    }

    public static function insertIntousers($username, $password, $type_user) {
        $con = mdlconection::connect();
        $passdb = mdlusers::generatePassword($password);
        $idtoken = mdlusers::insertIntotoken();
        $id_type_user = mdlusers::defineTypeuser($type_user);
        $insertintotableusers = "INSERT INTO users(username,password,enabled,id_type_user,idtoken)
        VALUES('$username','$passdb','1','$id_type_user','$idtoken')";
        if (!mysqli_query($con, $insertintotableusers)) {
            die('Error: ' . mysqli_error($con));
        }
    }

    public static function insertIntotoken() {
        $con = mdlconection::connect();
        $idtoken = mdlusers::generateIdtoken();
        $token = mdlusers::generateToken();
        $expiration = mdlusers::generateExpiration();
        $insertintotabletoken = "INSERT INTO token(idtoken,token,expiration)
        VALUES('$idtoken','$token','$expiration')";
        if (!mysqli_query($con, $insertintotabletoken)) {
            die('Error: ' . mysqli_error($con));
        }
        return $idtoken;
    }

    public static function generateIdtoken() {
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

    public static function generatePassword($password) {
        $pwd = password_hash($password, PASSWORD_DEFAULT);
        return $pwd;
    }

    public static function generateToken() {
        $token = bin2hex(openssl_random_pseudo_bytes(32));
        return $token;
    }

    public static function generateExpiration() {
        $fechaactual = date('Y-m-d H:i:s');
        $dt = new DateTime($fechaactual);
        $dt->modify('+ 1 year');
        $expiration = $dt->format("Y-m-d H:i:s");
        return $expiration;
    }

    public static function defineTypeuser($type_user) {
        $id_type_user = "";
        if ($type_user == 'administrator') {
            $id_type_user = 123456789;
        }
        if ($type_user == 'employee') {
            $id_type_user = 987654321;
        }
        return $id_type_user;
    }

    public static function userDateexist($username) {
        $con = mdlconection::connect();
        $checkuser = "SELECT * FROM users WHERE username='" . $username . "'";
        $resultofcheckuser = mysqli_query($con, $checkuser) or die(mysqli_error());
        $rowone = mysqli_fetch_array($resultofcheckuser);
        if (!$rowone[0]) {
            $exist = true;
        } else {
            mdlusers::wrongData();
        }
        return $exist;
    }

    public static function validateUsername($username, $password) {
        $usernamevalidate = false;
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $pass = mdlusers::validatePassword($password);
            $usernamevalidate = $pass;
        } else {
            mdlusers::wrongData();
        }
        return $usernamevalidate;
    }

    public static function validatePassword($password) {
        if (strlen(trim($password)) == 0) {
            mdlusers::wrongData();
        } else {
            $passwordvalidate = true;
        }
        return $passwordvalidate;
    }

    public static function wrongData() {
        echo '<script language = javascript> alert("Datos Incorrectos") </script>';
        echo "<html><head></head>" .
        "<body onload=\"javascript:history.back()\">" .
        "</body></html>";
        exit;
    }

}

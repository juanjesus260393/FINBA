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
        $checkusers = "SELECT u.username, t.type_user FROM users u inner join type_users t 
            on u.id_type_user = t.id_type_user inner join token k on u.username = k.username where k.token <>'" . $_SESSION['token'] . "'";
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

    public static function validateUserdates($username, $password, $type_user) {
        $userdata = mdlusers::validateUsername($username, $password);
        if ($userdata) {
            $userdataexist = mdlusers::userDateexist($username);
            if ($userdataexist) {
                echo 'la informaciones correcta y el usuario no existe';
            }
        }
    }

    public static function insertUser($username, $password, $type_user) {
        $id_type_user = mdlusers::defineTypeuser($type_user);

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

    public static function insertIntousers($username, $password) {
        $con = mdlconection::connect();
        $insertintotableusers = "INSERT INTO revision_objeto(id_revision_objeto,id_empresa,fecha_creacion,fecha_actualizacion,status)
        VALUES('$idro'," . $_SESSION['idemp'] . ",'$fa','0000-00-00','$status')";
        if (!mysqli_query($con, $sql)) {
            die('Error: ' . mysqli_error($pd));
        }
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
//Regresamos a la pagina anterior
        echo "<html><head></head>" .
        "<body onload=\"javascript:history.back()\">" .
        "</body></html>";
        exit;
    }

}

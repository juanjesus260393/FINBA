<?php

/*
 *   proyecto FINBA
 *   Nombre: mdlusers
 *   Autor: Juan Jesus Garcia Centeno
 *   Fecha: 08-03-2011
 *   Versión: 1.0
 *   Descripcion: modelo en el que se establecen las funciones necesarias para la correcta administracion de los usuarios.
 * 
 *   por Fabrica de Software, CIC-IPN
 */

//Modelos adicionales que requiere el archivo, dado que algunas funciones se encuentran en dichos archivos
require_once('mdlconection.php');
require_once("mdlauth.php");
require_once("../resources/helpers/validations.php");

// Evitar Notificar todos los errores de PHP
error_reporting(0);

class mdlusers {

    //variables para obtener la lista de usuarios y establecer la contexion
    private $users;
    private $dbh;

    public function __construct() {
        $this->dbh = mdlconection::connect();
    }

    /*
     *  getUsers
     *  Funcion que realiza la busqueda de usuarios que se tienen registrados en la bd, siempre que no sean empleados y sean diferentes al token
     *  que esta realizando la consulta
     */

    public function getUsers() {
        session_start();
        $checkusers = "SELECT u.username, u.name, u.first_name, u.work_position, u.idimg_user FROM users u inner join type_users t on u.id_type_user = t.id_type_user
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

    /*
     *  insertUser
     *  Funcion a la que se accede por medio del controlador para registrar a un nuevo usuario
     */

    public static function insertUser($username, $password, $schooluser, $work_position, $name, $first_name, $second_name, $idimg_user) {
        mdlusers::validateUserdates($username, $password, $schooluser, $work_position, $name, $first_name, $second_name, $idimg_user);
    }

    /*
     *  updateUser
     *  Funcion a la que se accede por medio del controlador para actualizar el tipo de usuario a administrador
     */

    public static function updateUser($usernameforupdate, $usertypeprevious, $newtype_user) {
        mdlusers::verifyTypeofuser($usernameforupdate, $usertypeprevious, $newtype_user);
    }

    /*
     *  verifyTypeofuser
     *  Funcion que permite acceder al metodo actualizar usuarios siempre que el tipo previo no se adminisrtrador.
     *   si el tipó previo es administrador regresa al usuario a la pagina anterior
     */

    public static function verifyTypeofuser($usernameforupdate, $usertypeprevious, $newtype_user) {
        if ($usertypeprevious == 'Administrador') {
            echo '<script language = javascript> alert("Solo se pueden modificar los usuarios de tipo empleado") </script>';
            echo "<html><head></head>" .
            "<body onload=\"javascript:history.back()\">" .
            "</body></html>";
            exit;
        } else {
            mdlusers::updateIntousers($usernameforupdate, $newtype_user);
        }
    }

    /*
     *  updateIntousers
     *  funcion que actualiza el registro de un usuario asignandole un nuevo tipo de usuario
     */

    public static function updateIntousers($usernameforupdate, $newtype_user) {
        $con = mdlconection::connect();
        $newtypeuserdb = mdlusers::defineTypeuser($newtype_user);
        $updateintotableusers = "update users set id_type_user = '$newtypeuserdb' where username = '$usernameforupdate'";
        if (!mysqli_query($con, $updateintotableusers)) {
            die('Error: ' . mysqli_error($con));
        }
    }

    /*
     *  deleteuser
     *  funcion en la cual dependiendo de si el tipo de usuario es administrador permite acceder a la funcion
     *  encargada de eliminar al suaurio, en caso contrario  se regresa al usuario a la pagina anterior
     */

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

    /*
     *  deleteUseroftable
     *  funcion que elimina el registro del usuario asi como el de la tabla token
     */

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

    /*
     *  getTokenid
     *  funcion que busca el identificador del token de un usuario en especifico y lo regresa a la funcion que lo necesita
     */

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

    /* isAdminsitrator
     * Funcion que se encarga de obtener el tipo de usuario en base a un token en especifico, si no existe
     * regresa al usuario a la pagina de inicio de sesion
     */

    public static function isAdministrator() {
        session_start();
        $con = mdlconection::connect();
        $checkuser = "SELECT f.type_user FROM token t inner join users u on t.idtoken =u.idtoken inner join
            type_users f on u.id_type_user =  f.id_type_user where t.token ='" . $_SESSION['token'] . "'";
        $resultofcheckuser = mysqli_query($con, $checkuser) or die(mysqli_error());
        $rowtypeofuser = mysqli_fetch_array($resultofcheckuser);
        if (!$rowtypeofuser [0]) {
            Mdlauth::Logout();
        } else {
            $type_user = $rowtypeofuser['type_user'];
        }
        return $type_user;
    }

    /*
     * verifyIfisadministrator
     *  funcion que se encarga de obtener el tipo de usuario en base a un oken en especifico
     *  si el typo de usuario existe se envia a la funcion que lo requiere, en caso de que no se regresa a la vista principal 
     */

    public static function verifyIfisadministrator() {
        session_start();
        if (isset($_SESSION['token'])) {
            $con = mdlconection::connect();
            $checkuser = "SELECT f.type_user FROM token t inner join users u on t.idtoken =u.idtoken inner join
            type_users f on u.id_type_user =  f.id_type_user where t.token ='" . $_SESSION['token'] . "'";
            $resultofcheckuser = mysqli_query($con, $checkuser) or die(mysqli_error());
            $rowtypeofuser = mysqli_fetch_array($resultofcheckuser);
            if (!$rowtypeofuser [0]) {
                echo '<script language = javascript>
	alert("El usuario no se encuenta registrado")
           self.location = "../views/vwmenuprincipal.php"
	</script>';
                exit;
            } else {
                $type_user = $rowtypeofuser['type_user'];
                mdlusers::isNotadministrator($type_user);
            }
        } else {
            Mdlauth::Logout();
        }
    }

    /*
     *  isNoadministrator
     *  funcion que se encarga de definir si un usuario es administrador o empleadio, en el caso de que sea empleado regresa al usuario a la vista 
     *  principall
     */

    public static function isNotadministrator($type_user) {
        if ($type_user == 'administrator') {
            //nothing
        }
        if ($type_user == 'Employee') {
            echo '<script language = javascript>
	alert("Solo los administradores pueden acceder a esta seccion")
           self.location = "../views/vwmenuprincipal.php"
	</script>';
        }
    }

    /*
     *  validationsUserdates
     *  funcion que se encarga de validar la informacion del usuario, si el usuario no existe o esta registrado previamente
     *  si la informacion no esta registrada previamente permite la realizacion del nuevo registro
     */

    public static function validateUserdates($username, $password, $schooluser, $work_position, $name, $first_name, $second_name, $idimg_user) {
        $userdata = mdlusers::validateUsername($username, $password);
        if ($userdata) {
            $userdataexist = mdlusers::userDateexist($username);
            if ($userdataexist) {
                mdlusers::insertIntousers($username, $password, $schooluser, $work_position, $name, $first_name, $second_name, $idimg_user);
            } else {
                mdlusers::wrongData();
            }
        }
    }

    /*
     *  insertIntousers
     *  funcion que se encarga de generar el registro de un usuario nuevo por parte de un administrador
     */

    public static function insertIntousers($username, $password, $schooluser, $work_position, $name, $first_name, $second_name, $idimg_user) {
        $con = mdlconection::connect();
        $passdb = mdlusers::generatePassword($password);
        $idtoken = mdlusers::insertIntotoken();
        $idschool = mdlusers::determinateSchoolid($schooluser);
        $newimage = mdlusers::uploadLogoimage($idimg_user);
        $id_type_user = '987654321';
        $insertintotableusers = "INSERT INTO users(username,password,enabled,id_type_user,idtoken,idSchools,work_position,name,first_name,second_name,idimg_user)
        VALUES('$username','$passdb','1','$id_type_user','$idtoken','$idschool','$work_position','$name','$first_name','$second_name','$newimage')";
        if (!mysqli_query($con, $insertintotableusers)) {
            die('Error: ' . mysqli_error($con));
        }
    }

    /*
     *  insertIntotoken
     *  funcion que se encarga de insertar el token de un usuario que se acaba de registrar
     */

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

    /*
     *  uploadLogoimage
     *  funcion que se encarga de determinar el nombre de la imagen el cual sera ingresado en la base de datos.
     */

    public static function uploadLogoimage($idimg_user) {
        if (empty($idimg_user)) {
            $image_name_insert = "";
        } else {
            $identificadornuevaimagen = validations::generateRamdonids();
            $new_image_panel = $identificadornuevaimagen . ".jpg";
            move_uploaded_file($_FILES['idimg_user']['tmp_name'], "../resources/img/logotipos/$new_image_panel");
            $image_name_insert = $new_image_panel;
        }
        return $image_name_insert;
    }

    /*
     *  generateIdtoken
     *  funcion que se encarga de generar el token de una longitud de 10 digitos
     */

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

    /*
     *  generatePassword
     *  funcion que se encarga de encriptar la contraseña de un usuario
     */

    public static function generatePassword($password) {
        $pwd = password_hash($password, PASSWORD_DEFAULT);
        return $pwd;
    }

    /*
     *  determinateSchoolid
     *  funcion determina el identificador de la escuela
     */

    public static function determinateSchoolid($schooluser) {
        $con = mdlconection::connect();
        $checkidschool = "SELECT s.idSchools FROM dbfinba.schools s where s.Schoolsname = '" . $schooluser . "'";
        $resultofcheckschools = mysqli_query($con, $checkidschool) or die(mysqli_error());
        $rowidschool = mysqli_fetch_array($resultofcheckschools);
        if (!$rowidschool [0]) {
            Mdlauth::Logout();
        } else {
            $idschool = $rowidschool['idSchools'];
        }
        return $idschool;
    }

    /*
     *  Generate Token
     *  funcion que generar el oken en base hexadecimal
     */

    public static function generateToken() {
        $token = bin2hex(openssl_random_pseudo_bytes(32));
        return $token;
    }

    /*
     *  generateExpiration
     *  funcion que se encarga de generar la fecha de expiracion de un token
     */

    public static function generateExpiration() {
        $fechaactual = date('Y-m-d H:i:s');
        $dt = new DateTime($fechaactual);
        $dt->modify('+ 1 year');
        $expiration = $dt->format("Y-m-d H:i:s");
        return $expiration;
    }

    /*
     *  defineTypeuser
     *  funcion que se encarga de definir el identificador del tipo de usuario en base al tipo de usuario que detecta
     */

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

    /*
     *  userDateexist
     *  funcion que verifica si un usuarios se encuentra registrado
     */

    public static function userDateexist($username) {
        $con = mdlconection::connect();
        $checkuser = "SELECT * FROM users WHERE username='" . $username . "'";
        $resultofcheckuser = mysqli_query($con, $checkuser) or die(mysqli_error());
        $rowone = mysqli_fetch_array($resultofcheckuser);
        if (!$rowone[0]) {
            $exist = true;
        } else {
            mdlusers::wrongUserinformation();
        }
        return $exist;
    }

    /*
     *  validateUsername
     *  funcion que se encarga de validar si el usuario se encuentra registrado 
     */

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

    /*
     *  validatePassword
     *  funcion que se encarga de verificas si la contraseña no se encuentra vacia
     */

    public static function validatePassword($password) {
        if (strlen(trim($password)) == 0) {
            mdlusers::wrongData();
        } else {
            $passwordvalidate = true;
        }
        return $passwordvalidate;
    }

    /*
     *  wrongData
     *  Funcion que se regresa al usuario a la pagina antetior si los datos proporcionados no son los correctos
     */

    public static function wrongData() {
        echo '<script language = javascript> alert("Datos Incorrectos") </script>';
        echo "<html><head></head>" .
        "<body onload=\"javascript:history.back()\">" .
        "</body></html>";
        exit;
    }

    /*
     *  wrongUserinformation
     *  funcion que regresa al usuario a la vista principal.
     */

    public static function wrongUserinformation() {
        echo '<script language = javascript>
	self.location = "../views/users/vwmenuprincipal.php"
	</script>';
    }

}


<?php

/*
 *   proyecto FINBA
 *   Nombre: Mdlauth
 *   Autor: Juan Jesus Garcia Centeno
 *   Fecha: 08-03-2011
 *   Versión: 1.0
 *   Descripcion: modelo en el que se establecen las funciones que se requieren para el inicio de seion,
 *   y cualquier funcion adicional a fin de obtener un mejor rendimiento del codigo
 * 
 *   por Fabrica de Software, CIC-IPN
 */

//modelos adicionales que requiere este archivo debido a sus diferentes funciones que incluyen
require_once('mdlconection.php');
require_once("C:/xampp/htdocs/finbaproject/FINBA/models/mdlsecurity.php");
require_once("C:/xampp/htdocs/finbaproject/FINBA/models/mdlusers.php");

class Mdlauth {
    /*
     * Login
     * Funcion que se encarga de obterner el token de registro del usuario,
     * si cumple con ciertas carateristicas se accede al meni principal, en caso contrario regresa a la pagina anterior
     */

    public static function Login($username, $password) {
        $userexist = Mdlauth::userExists($username);
        if ($userexist) {
            $validatetokendb = Mdlauth::validatePassword($username, $password);
            $schoolname = Mdlauth::getSchoolname($validatetokendb);
            $_SESSION['token'] = $validatetokendb;
            $_SESSION['Schoolsname'] = $schoolname;
        } else {
            mdlusers::wrongData();
        }
    }

    /*
     *  Logout
     *  Funcion que eliminar la sesion y regresa al usuario a la pagina de inicio
     */

    public static function Logout() {
        unset($_SESSION);
        session_destroy();
        echo '<script language = javascript>    
	self.location = "../index.php"
	</script>';
        exit();
    }

    /*
     * changedPassword
     * funcion que cambia la contraseña si el usuario se encuentra registrado y la proporcionada no esta vacia
     */

    public static function changedPassword($newpassword) {
        $encrypetdpass = mdlusers::generatePassword($newpassword);
        $usernamedb = Mdlauth::searchPass();
        if (!empty($usernamedb) && !empty($encrypetdpass)) {
            Mdlauth::updatePass($usernamedb, $encrypetdpass);
        } else {
            Mdlauth::Logout();
        }
    }

    /*
     *  searchPass
     *  funcion que busca la contraseña de un usuario que ha iniciado sesion, si no se obtiene un resultado acorde 
     *  a la busquedad se regresa al usuario a la pagina principal, en caso contrario regresa el nombre de usuario.
     */

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

    /*
     *  updatePass
     *  funcion que actualiza la contrase de un usuario por una previamente registrada
     */

    public static function updatePass($usernamedb, $encrypetdpass) {
        $con = mdlconection::connect();
        $updateintotableusers = "update users set password = '$encrypetdpass' where username = '$usernamedb'";
        if (!mysqli_query($con, $updateintotableusers)) {
            Mdlauth::Logout();
        }
    }

    /*
     *  userExists
     *  funcion que busca el registro de un usuario, si este existe regresa como valor verdadero. en caso contrario regresa al usuario 
     *  la pagina principal.
     */

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

    /*
     *  validetePassword
     *  funcion que verifica que la contraseña del usuario con la registrada en la base de datos coincidan
     *  si coinciden se genera el token de usuario, en caso contrario se regresa al usuario a la pagina principal.
     */

    public static function validatePassword($username, $password) {
        $getpassword = Mdlauth::searchPassword($username);
        if (password_verify($password, $getpassword)) {
            $tokendb = Mdlauth::searchToken($username);
            $validatetokendb = Mdlauth::generateUsertoken($username, $password, $tokendb);
        } else {
            echo '<script language = javascript>
	alert("La contraseña no es correcta")
           self.location = "../index.php"
	</script>';
        }
        return $validatetokendb;
    }

    /*
     *  generateUsertoken
     * funcion que verifica si una cadena construida previamente es igual a otra con la informacion proporcionada por el usuario
     */

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

    /*
     *  searchPassword
     *  funcion que busca la contraseña de un usuario en base al nombre de usuario proporcionado por el usuario
     *  si la contraseña existe se regresa, en cao contrario se regresa a la pagina principal
     */

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

    /*
     * 
     */

    public static function getSchoolname($validatetokendb) {
        $con = mdlconection::connect();
        $searchschoolname = "SELECT s.Schoolsname FROM dbfinba.users u inner join dbfinba.schools s on u.idSchools = s.idSchools 
        inner join dbfinba.token t on u.idtoken = t.idtoken where t.token ='" . $validatetokendb . "'";
        $resultofsearchschoolname = mysqli_query($con, $searchschoolname) or die(mysqli_error());
        $rowschoolname = mysqli_fetch_array($resultofsearchschoolname);
        if (!$rowschoolname[0]) {
            echo '<script language = javascript>
	alert("El usuario no se encuenta registrado")
           self.location = "../index.php"
	</script>';
        } else {
            $Schoolsname = $rowschoolname['Schoolsname'];
        }
        return $Schoolsname;
    }

    /*
     * searchIdtoken
     *  funcion que busca el token de un usuario en base al nombre de usuario proporcionado,
     *  si el token existe se regresa, en caso contrario se regresa al usuario a la pagina principal
     */

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

    /*
     *  searchToken
     *  funcion que busca el token de un usuario en base al identificador del token, si existe el token se regresa
     *  en caso contrario se regresa añ usuario a la pagina principal.
     */

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

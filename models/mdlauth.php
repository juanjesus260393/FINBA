
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
require_once("C:/xampp/htdocs/finbaproject/FINBA/resources/sendmails/mailer.php");

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
            $image = Mdlauth::getImagepanel($validatetokendb);
            $typeofuser = Mdlauth::getTypeofuser($validatetokendb);
            $idimg_user = Mdlauth::getImagelogo($validatetokendb);
            $name = Mdlauth::getNameofuser($validatetokendb);
            $firstname = Mdlauth::getFirstnameofuser($validatetokendb);
            $secondname = Mdlauth::getSecondnameofuser($validatetokendb);
            $workposition = Mdlauth::getWorkpositionofuser($validatetokendb);
            $_SESSION['token'] = $validatetokendb;
            $_SESSION['Schoolsname'] = $schoolname;
            $_SESSION['id_image_panel'] = $image;
            $_SESSION['type_user'] = $typeofuser;
            $_SESSION['idimg_user'] = $idimg_user;
            $_SESSION['name'] = $name;
            $_SESSION['first_name'] = $firstname;
            $_SESSION['second_name'] = $secondname;
            $_SESSION['work_position'] = $workposition;
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

    public static function closeSession() {
        unset($_SESSION);
        session_destroy();
        echo '<script language = javascript> 
        alert("Ha ocurrido un error")
	self.location = "../index.php"
	</script>';
        exit();
    }

    public static function wrongPass() {
        unset($_SESSION);
        session_destroy();
        echo '<script language = javascript> 
        alert("La contraseña no es la correcta")
	self.location = "../index.php"
	</script>';
        exit();
    }

    /*
     * changedPassword
     * funcion que cambia la contraseña si el usuario se encuentra registrado y la proporcionada no esta vacia
     */

    public static function changedPassword($newpassword, $nameprevious, $newname, $firstnameprevious, $newfirstname, $secondnameprevious, $newsecondname, $workpositionprevious, $workpositionnew, $passprevious) {
        if (!empty($newpassword)) {
            $newpass = mdlusers::generatePassword($newpassword);
        } else {
            $newpass = $passprevious;
        }
        $usernamedb = Mdlauth::searchPass();
        if (!empty($usernamedb) && !empty($newpass)) {
            $name = Mdlauth::decideName($nameprevious, $newname);
            $firsname = Mdlauth::decideFirstname($firstnameprevious, $newfirstname);
            $secondname = Mdlauth::decideSecondtname($secondnameprevious, $newsecondname);
            $workposition = Mdlauth::decideWorkposition($workpositionprevious, $workpositionnew);
            Mdlauth::updatePass($usernamedb, $newpass, $name, $firsname, $secondname, $workposition);
        } else {
            Mdlauth::Logout();
        }
    }

    /*
     *  searchPass
     *  funcion que busca la contraseña de un usuario que ha iniciado sesion, si no se obtiene un resultado acorde 
     *  a la busquedad se regresa al usuario a la pagina principal, en caso contrario regresa el nombre de usuario.
     */

    /*
     *  searchPass
     *  funcion que busca la contraseña de un usuario que ha iniciado sesion, si no se obtiene un resultado acorde 
     *  a la busquedad se regresa al usuario a la pagina principal, en caso contrario regresa el nombre de usuario.
     */

    public static function decideName($nameprevious, $newname) {
        $name = '';
        if (empty($newname)) {
            $name = $nameprevious;
        } else {
            $name = $newname;
        }
        return $name;
    }

    /*
     *  searchPass
     *  funcion que busca la contraseña de un usuario que ha iniciado sesion, si no se obtiene un resultado acorde 
     *  a la busquedad se regresa al usuario a la pagina principal, en caso contrario regresa el nombre de usuario.
     */

    public static function decideFirstname($firstnameprevious, $newfirstname) {
        $firsname = '';
        if (empty($newfirstname)) {
            $firsname = $firstnameprevious;
        } else {
            $firsname = $newfirstname;
        }
        return $firsname;
    }

    /*
     *  searchPass
     *  funcion que busca la contraseña de un usuario que ha iniciado sesion, si no se obtiene un resultado acorde 
     *  a la busquedad se regresa al usuario a la pagina principal, en caso contrario regresa el nombre de usuario.
     */

    public static function decideSecondtname($secondnameprevious, $newsecondname) {
        $secondname = '';
        if (empty($newsecondname)) {
            $secondname = $secondnameprevious;
        } else {
            $secondname = $newsecondname;
        }
        return $secondname;
    }

    /*
     *  searchPass
     *  funcion que busca la contraseña de un usuario que ha iniciado sesion, si no se obtiene un resultado acorde 
     *  a la busquedad se regresa al usuario a la pagina principal, en caso contrario regresa el nombre de usuario.
     */

    public static function decideWorkposition($workpositionprevious, $workpositionnew) {
        $workposition = '';
        if (empty($workpositionnew)) {
            $workposition = $workpositionprevious;
        } else {
            $workposition = $workpositionnew;
        }
        return $workposition;
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
            Mdlauth::wrongPass();
        } else {
            $passdb = $rowone['username'];
        }
        return $passdb;
    }

    /*
     *  searchPass
     *  funcion que busca la contraseña de un usuario que ha iniciado sesion, si no se obtiene un resultado acorde 
     *  a la busquedad se regresa al usuario a la pagina principal, en caso contrario regresa el nombre de usuario.
     */

    public static function searchPassprevious() {
        $con = mdlconection::connect();
        $searcpassword = "SELECT u.password FROM token t inner join users u on t.idtoken =u.idtoken inner join
            type_users f on u.id_type_user =  f.id_type_user where t.token ='" . $_SESSION['token'] . "'";
        $resultofsearcpassword = mysqli_query($con, $searcpassword) or die(mysqli_error());
        $rowpass = mysqli_fetch_array($resultofsearcpassword);
        if (!$rowpass[0]) {
            Mdlauth::wrongPass();
        } else {
            $passdb = $rowpass['password'];
        }
        return $passdb;
    }

    /*
     *  updatePass
     *  funcion que actualiza la contrase de un usuario por una previamente registrada
     */

    public static function updatePass($usernamedb, $newpass, $name, $firsname, $secondname, $workposition) {
        $con = mdlconection::connect();
        $updateintotableusers = "update users set password = '$newpass', name ='$name', first_name = '$firsname', "
                . "second_name = '$secondname', work_position = '$workposition' where username = '$usernamedb'";
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
            Mdlauth::Logout();
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
            Mdlauth::closeSession();
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
            Mdlauth::closeSession();
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
            $Schoolsname = '';
        } else {
            $Schoolsname = $rowschoolname['Schoolsname'];
        }
        return $Schoolsname;
    }

    public static function getImagepanel($validatetokendb) {
        $con = mdlconection::connect();
        $searchschoolimage = "SELECT p.id_image_panel FROM dbfinba.users u inner join dbfinba.schools s on u.idSchools = s.idSchools 
        inner join dbfinba.token t on u.idtoken = t.idtoken inner join dbfinba.solar_panel p on u.username = p.username
        where t.token = '" . $validatetokendb . "' and p.id_image_panel <> '' limit 1";
        $resultofsearchschoolimage = mysqli_query($con, $searchschoolimage) or die(mysqli_error());
        $rowschoolimage = mysqli_fetch_array($resultofsearchschoolimage);
        if (!$rowschoolimage[0]) {
            $Schoolsimage = '';
        } else {
            $Schoolsimage = $rowschoolimage['id_image_panel'];
        }
        return $Schoolsimage;
    }

    public static function getImagelogo($validatetokendb) {
        $con = mdlconection::connect();
        $searchlogoimage = "SELECT u.idimg_user FROM dbfinba.users u inner join dbfinba.token t on u.idtoken = t.idtoken 
        where t.token = '" . $validatetokendb . "'";
        $resultofsearchlogoimage = mysqli_query($con, $searchlogoimage) or die(mysqli_error());
        $rowlogoimage = mysqli_fetch_array($resultofsearchlogoimage);
        if (!$rowlogoimage[0]) {
            $idimg_user = '';
        } else {
            $idimg_user = $rowlogoimage['idimg_user'];
        }
     
        return $idimg_user;
    }

    public static function getTypeofuser($validatetokendb) {
        $con = mdlconection::connect();
        $searchtypeuser = "SELECT y.type_user FROM dbfinba.users u inner join dbfinba.type_users y on y.id_type_user=u.id_type_user
        inner join dbfinba.token t on u.idtoken = t.idtoken where t.token = '" . $validatetokendb . "'";
        $resultofsearchtyoeofuser = mysqli_query($con, $searchtypeuser) or die(mysqli_error());
        $rowstypeofuser = mysqli_fetch_array($resultofsearchtyoeofuser);
        if (!$rowstypeofuser[0]) {
            $typeofuser = '';
        } else {
            $typeofuser = $rowstypeofuser['type_user'];
        }
        return $typeofuser;
    }

    public static function getNameofuser($validatetokendb) {
        $con = mdlconection::connect();
        $searchusername = "SELECT u.name FROM dbfinba.users u inner join dbfinba.type_users y on y.id_type_user=u.id_type_user
        inner join dbfinba.token t on u.idtoken = t.idtoken where t.token = '" . $validatetokendb . "'";
        $resultofsearchusername = mysqli_query($con, $searchusername) or die(mysqli_error());
        $rowstusername = mysqli_fetch_array($resultofsearchusername);
        if (!$rowstusername[0]) {
            $name = '';
        } else {
            $name = $rowstusername['name'];
        }
        return $name;
    }

    public static function getFirstnameofuser($validatetokendb) {
        $con = mdlconection::connect();
        $searchfirstname = "SELECT u.first_name FROM dbfinba.users u inner join dbfinba.type_users y on y.id_type_user=u.id_type_user
        inner join dbfinba.token t on u.idtoken = t.idtoken where t.token = '" . $validatetokendb . "'";
        $resultofsearchfirstname = mysqli_query($con, $searchfirstname) or die(mysqli_error());
        $rowstfirstname = mysqli_fetch_array($resultofsearchfirstname);
        if (!$rowstfirstname[0]) {
            $firstname = '';
        } else {
            $firstname = $rowstfirstname['first_name'];
        }
        return $firstname;
    }

    public static function getSecondnameofuser($validatetokendb) {
        $con = mdlconection::connect();
        $searchsecondname = "SELECT u.second_name FROM dbfinba.users u inner join dbfinba.type_users y on y.id_type_user=u.id_type_user
        inner join dbfinba.token t on u.idtoken = t.idtoken where t.token = '" . $validatetokendb . "'";
        $resultofsearchsecondname = mysqli_query($con, $searchsecondname) or die(mysqli_error());
        $rowsecondname = mysqli_fetch_array($resultofsearchsecondname);
        if (!$rowsecondname[0]) {
            $secondname = '';
        } else {
            $secondname = $rowsecondname['second_name'];
        }
        return $secondname;
    }

    public static function getWorkpositionofuser($validatetokendb) {
        $con = mdlconection::connect();
        $searchworkposition = "SELECT u.work_position FROM dbfinba.users u inner join dbfinba.type_users y on y.id_type_user=u.id_type_user
        inner join dbfinba.token t on u.idtoken = t.idtoken where t.token = '" . $validatetokendb . "'";
        $resultofsearchworkposition = mysqli_query($con, $searchworkposition) or die(mysqli_error());
        $rowworkposition = mysqli_fetch_array($resultofsearchworkposition);
        if (!$rowworkposition[0]) {
            $workposition = '';
        } else {
            $workposition = $rowworkposition['work_position'];
        }
        return $workposition;
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
            Mdlauth::closeSession();
        } else {
            $tokendb = $rowthree['token'];
        }
        return $tokendb;
    }

    /*
     *  searchToken
     *  funcion que busca el token de un usuario en base al identificador del token, si existe el token se regresa
     *  en caso contrario se regresa añ usuario a la pagina principal.
     */

    public static function prepareResetpass($usernameresetpass) {
        $userexist = Mdlauth::userExists($usernameresetpass);
        if ($userexist) {
            $newpassreset = Mdlauth::generate_password($usernameresetpass);
            $newpass = password_hash($newpassreset, PASSWORD_DEFAULT);
            Mdlauth::updatePass($usernameresetpass, $newpass);
            mailer::sendPassmail($usernameresetpass, $newpassreset, 0);
        } if (empty($userexist)) {
            echo '<script language = javascript> alert("El usuario no existe") </script>';
            echo "<html><head></head>" .
            "<body onload=\"javascript:history.back()\">" .
            "</body></html>";
            exit();
        }
    }

    /*
     *  searchToken
     *  funcion que busca el token de un usuario en base al identificador del token, si existe el token se regresa
     *  en caso contrario se regresa añ usuario a la pagina principal.
     */

    public static function generate_password($usernameresetpass) {
        $cadena_base = $usernameresetpass;
        $cadena_base .= '0123456789';
        $cadena_base .= '@#%.@';
        $password = '';
        $limite = strlen($cadena_base) - 1;
        for ($i = 0; $i < 8; $i++) {
            $password .= $cadena_base[rand(0, $limite)];
        }
        return $password;
    }

}

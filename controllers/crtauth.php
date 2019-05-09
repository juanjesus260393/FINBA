<?php

require_once("../models/mdlauth.php");

session_start();

//Variables para iniciar sesion
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

//Variables para serrar sesion
$closesesion = filter_input(INPUT_POST, 'closesesion');

//Variables para el cambio de contraseña
$changedpass = filter_input(INPUT_POST, 'changedpass');
$valueforpassword = filter_input(INPUT_POST, 'valueforpassword');

//Variables para el reseteo de la contraseña
$usernameresetpass = filter_input(INPUT_POST, 'usernameresetpass');
$resetpass = filter_input(INPUT_POST, 'resetpass');

//Variables para el cambio de informacion del usuario
$newpassword = filter_input(INPUT_POST, 'newpassword');
$passprevious = filter_input(INPUT_POST, 'passprevious');
$nameprevious = filter_input(INPUT_POST, 'nameprevious');
$newname = filter_input(INPUT_POST, 'newname');
$firstnameprevious = filter_input(INPUT_POST, 'firstnameprevious');
$newfirstname = filter_input(INPUT_POST, 'newfirstname');
$secondnameprevious = filter_input(INPUT_POST, 'secondnameprevious');
$newsecondname = filter_input(INPUT_POST, 'newsecondname');
$workpositionprevious = filter_input(INPUT_POST, 'workpositionprevious');
$workpositionnew = filter_input(INPUT_POST, 'workpositionnew');


//Inicio de sesion
if (!empty($username) && !empty($password)) {
    if (!isset($_SESSION['token']) && empty($_SESSION['token'])) {
        Mdlauth::Login($username, $password);
        echo '<script language = javascript>
	self.location = "../views/vwmenuprincipal.php"
	</script>';
    } else {
        Mdlauth::closeSession();
    }
}

//Se llama a la funcion cerrar sesion
if ($closesesion) {
    Mdlauth::Logout();
}
//Se llama a la vista cambiar contraseña
if (!empty($changedpass) && $changedpass) {
    $passsearch = Mdlauth::searchPassprevious();
    require_once("../views/users/vwalterpassword.php");
}
//Se llama a la funcion resetear la contraseña
if (!empty($usernameresetpass) && !empty($resetpass) && $resetpass == '1') {
    Mdlauth::prepareResetpass($usernameresetpass);
    echo '<script language = javascript>
	self.location = "../index.php"
	</script>';
}
//Se llama la funcion cambiar contraseña y/o informacion del usuario
if (!empty($valueforpassword) && $valueforpassword == 'valueforpassword') {
    Mdlauth::changedPassword($newpassword, $nameprevious, $newname, $firstnameprevious, $newfirstname, $secondnameprevious, $newsecondname, $workpositionprevious, $workpositionnew,$passprevious);
    echo '<script language = javascript>
	self.location = "../views/vwmenuprincipal.php"
	</script>';
}
//Validacion de seguridad para cuando un usuario externo accede
if (empty($closesesion) && empty($changedpass) && empty($password) && empty($username) && empty($valueforpassword) && empty($newpassword)) {
    mdlsecurity::validationSecurity();
}




 





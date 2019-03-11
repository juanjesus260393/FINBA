<?php

require_once("../models/mdlauth.php");

session_start();

//Variables post
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$closesesion = filter_input(INPUT_POST, 'closesesion');
$changedpass = filter_input(INPUT_POST, 'changedpass');
$newpassword = filter_input(INPUT_POST, 'newpassword');
$valueforpassword = filter_input(INPUT_POST, 'valueforpassword');


//Inicio de sesion
 if (!empty($username) && !empty($password)) {
    if (!isset($_SESSION['token']) && empty($_SESSION['token'])) {
        Mdlauth::Login($username, $password);
        echo '<script language = javascript>
	self.location = "../views/vwmenuprincipal.php"
	</script>';
    }
    else{
       // Mdlauth::Logout();
    }
}
 
//Se llama a la funcion cerrar sesion
if ($closesesion && empty($username) && empty($password)) {
    Mdlauth::Logout();
}
//Se llama a la vista cambiar contraseña
if (!empty($changedpass) && $changedpass) {
    require_once("../views/users/vwalterpassword.php");
}
//Se llama la funcion cambiar contraseña
if (!empty($valueforpassword) && $valueforpassword == 'valueforpassword' && !empty($newpassword)) {
    Mdlauth::changedPassword($newpassword);
    echo '<script language = javascript>
	self.location = "../views/vwmenuprincipal.php"
	</script>';
}
//Validacion de seguridad para cuando un usuario externo accede
if (empty($closesesion) && empty($changedpass) && empty($password) && empty($username) && empty($valueforpassword) && empty($newpassword)) {
    mdlsecurity::validationSecurity();
}




 





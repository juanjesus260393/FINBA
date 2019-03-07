<?php

require_once("../models/mdlusers.php");
//variables POST
//Varliables utilizadas en la insercion de usuarios
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$type_user = filter_input(INPUT_POST, 'type_user');
//Variables utilizadas en la actualizacion de usuarios
$update = filter_input(INPUT_POST, 'update');
$usernameupdate = filter_input(INPUT_POST, 'usernameupdate');
$typeuserupdate = filter_input(INPUT_POST, 'typeuserupdate');
//nuevas varaibles a actualizar en el registro
$usernameforupdate = filter_input(INPUT_POST, 'usernameforupdate');
$usertypeprevious = filter_input(INPUT_POST, 'usertypeprevious');
$newtype_user = filter_input(INPUT_POST, 'newtype_user');
$valueupdate = filter_input(INPUT_POST, 'valueupdate');
$insert = filter_input(INPUT_POST, 'insert');
//varaibles GET utilizadas para la eliminacion de usuario
$delete_user = filter_input(INPUT_GET, 'delete');
$onlydelete = filter_input(INPUT_GET, 'onlydelete');
$delete_username = filter_input(INPUT_GET, 'username');
// variable de sesion para regresar al usuario en caso de que sea empleado y no permita la administracion de usuarios

if (!empty($delete_user)) {
    require_once("../models/mdlusers.php");
    mdlusers::deleteUser($delete_username);
    $users = new mdlusers();
    $listofusers = $users->getUsers();
    echo '<script language = javascript>
	self.location = "../views/vwmenuprincipal.php"
	</script>';
}

if (!empty($insert) && $insert) {
    if (empty($username) && empty($password) && empty($type_user)) {
        echo '<script language = javascript>
	self.location = "../views/vwadduser.php"
	</script>';
    }
}
if ($update && !empty($usernameupdate) && !empty($typeuserupdate)) {
    $usernameforupdate = $usernameupdate;
    $newtypeuserupdate = $typeuserupdate;
    require_once("../views/vwupdateuser.php");
}
if (!empty($username) && !empty($password) && !empty($type_user)) {
    require_once("../models/mdlusers.php");
    mdlusers::insertUser($username, $password, $type_user);
    $users = new mdlusers();
    $listofusers = $users->getUsers();
    require_once("../views/vwmanageusers.php");
}

if ($valueupdate == 'true' && !empty($usernameforupdate) && !empty($usertypeprevious) && !empty($newtype_user)) {
    require_once("../models/mdlusers.php");
    mdlusers::updateUser($usernameforupdate, $usertypeprevious, $newtype_user);
    $users = new mdlusers();
    $listofusers = $users->getUsers();
     echo '<script language = javascript>
	self.location = "../views/vwmenuprincipal.php"
	</script>';
} else {
    require_once("../models/mdlusers.php");
    $users = new mdlusers();
    $users->verifyIfisadministrator();
    $listofusers = $users->getUsers();
    require_once("../views/vwmanageusers.php");
}



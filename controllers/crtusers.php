<?php

require_once("../models/mdlusers.php");
//variables POST a utilizar en la administracion de usuarios
//Varliables utilizadas en la insercion de usuarios
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$type_user = filter_input(INPUT_POST, 'type_user');
$insert = filter_input(INPUT_POST, 'insert');

//Variables utilizadas en la actualizacion de usuarios
$update = filter_input(INPUT_POST, 'update');
$usernameupdate = filter_input(INPUT_POST, 'usernameupdate');
$typeuserupdate = filter_input(INPUT_POST, 'typeuserupdate');

//variables utulizadas en la actualizacion de un usuaruio
$usernameforupdate = filter_input(INPUT_POST, 'usernameforupdate');
$usertypeprevious = filter_input(INPUT_POST, 'usertypeprevious');
$newtype_user = filter_input(INPUT_POST, 'newtype_user');
$valueupdate = filter_input(INPUT_POST, 'valueupdate');

//varaibles GET utilizadas para la eliminacion de usuario
$delete_user = filter_input(INPUT_GET, 'delete');
$onlydelete = filter_input(INPUT_GET, 'onlydelete');
$delete_username = filter_input(INPUT_GET, 'username');

//Se llama a la funcion eliminar usuario y se regresa a la vista principal
if (!empty($delete_user)) {
    require_once("../models/mdlusers.php");
    mdlusers::deleteUser($delete_username);
    $users = new mdlusers();
    $listofusers = $users->getUsers();
    echo '<script language = javascript>
	self.location = "../views/vwmenuprincipal.php"
	</script>';
}
// se llama a la funcion agregar usuario
if (!empty($insert) && $insert) {
    if (empty($username) && empty($password) && empty($type_user)) {
        echo '<script language = javascript>
	self.location = "../views/users/vwadduser.php"
	</script>';
    }
}
// se llama a la vista actualizar usuario
if ($update && !empty($usernameupdate) && !empty($typeuserupdate)) {
    $usernameforupdate = $usernameupdate;
    $newtypeuserupdate = $typeuserupdate;
    require_once("../views/users/vwupdateuser.php");
}

// se llama a la funcion insertar usuario y se envia al usuario a la vista principal.
if (!empty($username) && !empty($password) && !empty($type_user)) {
    require_once("../models/mdlusers.php");
    mdlusers::insertUser($username, $password, $type_user);
    $users = new mdlusers();
    $listofusers = $users->getUsers();
    echo '<script language = javascript>
	self.location = "../views/vwmenuprincipal.php"
	</script>';
}
// se llama a la funcion actualizar usuario y se regresa al usuario a la vista principal
if ($valueupdate == 'true' && !empty($usernameforupdate) && !empty($usertypeprevious) && !empty($newtype_user)) {
    require_once("../models/mdlusers.php");
    mdlusers::updateUser($usernameforupdate, $usertypeprevious, $newtype_user);
    $users = new mdlusers();
    $listofusers = $users->getUsers();
    echo '<script language = javascript>
	self.location = "../views/vwmenuprincipal.php"
	</script>';
}
// se llama a la funcion obtener usuario y se llama a la vista adminsitrar usuarios
else {
    require_once("../models/mdlusers.php");
    $users = new mdlusers();
    $users->verifyIfisadministrator();
    $listofusers = $users->getUsers();
    require_once("../views/users/vwmanageusers.php");
}



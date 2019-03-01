<?php

require_once("../models/mdlusers.php");
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$type_user = filter_input(INPUT_POST, 'type_user');
if (!empty($username)) {
    
} else {
    require_once("../models/mdlusers.php");
    $users = new mdlusers();
    $listofusers = $users->getUsers();
    require_once("../views/vwmanageusers.php");
}
if(!empty($username)&&!empty($password)&&!empty($type_user)){
    require_once("../models/mdlusers.php");
    mdlusers::insertUser($username, $password, $type_user);
}

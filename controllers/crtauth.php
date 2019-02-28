<?php

session_start();
require_once("../models/mdlauth.php");
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
if (!empty($username) && !empty($password)) {
    Mdlauth::Login($username, $password);
    require '../views/vwmenuprincipal.php';
} else {
    Mdlauth::Logout();
}





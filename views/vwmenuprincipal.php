<?php
session_start();
//echo $_SESSION['token'];
require_once("../models/mdlsecurity.php");
mdlsecurity::validateToken();
?>
<?php 
include('../views/template1.php');
?>

<!-- Contenido pantalla principal -->
<!--  -->
<!--  -->
<!--  -->
<!-- Contenido pantalla principal -->
<?php
include('../views/template2.php');



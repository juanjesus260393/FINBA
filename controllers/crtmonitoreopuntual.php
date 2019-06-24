<?php
/**
 *   Proyecto FINBA
 *   Nombre: crtadddvc.php
 *   Autor: Isidro Delgado Murillo
 *   Fecha: 23-05-2019
 *   Versión: 1.0
 *   Descripcion: Controlador de Administracion de
 *   dispositivos, alta, baja, cambios y consulta
 *   por Fabrica de Software, CIC-IPN
 * 
 */
require_once("../models/mdlmonitoreoPuntual.php");
require_once ("../models/mdlconection.php");



            $Nom1 = filter_input(INPUT_POST, 'dos');
            $Nom2 = substr(filter_input(INPUT_POST, 'tres'), -1);
            $Nom3 = substr(filter_input(INPUT_POST, 'cuatro'), -1);
            $Nom6 = filter_input(INPUT_POST, 'siete');

$obj_mdlmonitoreo = new mdlmonitoreoPuntual();
$measures=$obj_mdlmonitoreo->getMeasures();
$measuresDia=$obj_mdlmonitoreo->getMeasuresDia($Nom1, $Nom2, $Nom3, $Nom6);


$auxconsulta=filter_input(INPUT_POST, 'mestoquery');

$añoconsulta=filter_input(INPUT_POST, 'añotoquery');
//var_dump($añoconsulta);
$mesañoconsulta= explode('-', $auxconsulta);

date_default_timezone_set('America/Mexico_City');
$meshoy = date("m");
$añohoy = date("Y");

if($auxconsulta){
    $prommes=$obj_mdlmonitoreo->getMeasuresMes($mesañoconsulta[1], $mesañoconsulta[0]);
}else{
$prommes=$obj_mdlmonitoreo->getMeasuresMes($meshoy, $añohoy);
}

if($añoconsulta){
    $promaño=$obj_mdlmonitoreo->getMeasuresaño($añoconsulta);
}else{
$promaño=$obj_mdlmonitoreo->getMeasuresaño($añohoy);
}

$nmed=$obj_mdlmonitoreo->getnumMed();
$diaact=$obj_mdlmonitoreo->getdia();





require '../views/Monitoreo/Puntuales.php';


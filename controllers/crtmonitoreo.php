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
require_once("../models/mdlmonitoreo.php");
require_once ("../models/mdlconection.php");
$obj_mdlmonitoreo = new mdlmonitoreo();
$measures=$obj_mdlmonitoreo->getMeasures();
$measuresDia=$obj_mdlmonitoreo->getMeasuresDia();
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





require '../views/Dispositivos/vwmonitoreo.php';

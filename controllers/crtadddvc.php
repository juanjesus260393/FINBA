<?php

require_once("../models/mdladddvc.php");
require_once ("../models/mdlconection.php");
$obj_mdladddvc = new mdladddvc();
$dispositivos= $obj_mdladddvc->getDispositivo();

if (isset($_POST['AddDvc'])) { 
    $a = $obj_mdladddvc->insertNomenclatura();
}
if (isset($_POST['UpdateDvc'])) {
    $mactoupdates=filter_input(INPUT_POST, 'mactoupdates');
  
    $a = $obj_mdladddvc->updatedvc($mactoupdates);
}
if(isset($_POST['bntdelete'])){
    $mactoquit=filter_input(INPUT_POST, 'mactodelete');
    $b= $obj_mdladddvc->deletedvc($mactoquit);
    
}


require '../views/Dispositivos/vwadddevice.php';

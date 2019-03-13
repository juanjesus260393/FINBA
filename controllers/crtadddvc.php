<?php


require_once("../models/mdladddvc.php");
require_once ("../models/mdlconection.php");
$obj_mdladddvc=new mdladddvc();
 




if(isset($_POST['AddDvc'])){
   $a=$obj_mdladddvc->insertNomenclatura();
       
} 
    


require '../views/Dispositivos/vwadddevice.php';

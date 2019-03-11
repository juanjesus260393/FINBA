<?php

$searchinventory = filter_input(INPUT_POST, 'searchinventory');

//busqueda del inventario
if (!empty($searchinventory) && $searchinventory == TRUE) {
    require_once("../models/mdlinventory.php");
    $inventory = new mdlinventory;
    $listofinventario = $inventory->getinventory();
    require_once("../views/inventory/vwmanageinventory.php");
}

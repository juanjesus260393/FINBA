<?php

session_start();
//setting header to json
header('Content-Type: application/json');

//database
require_once('../../../models/mdlconection.php');

//get connection
$mysqli = mdlconection::connect();

if (!$mysqli) {
    die("Connection failed: " . $mysqli->error);
}
$searchfordayusr = filter_input(INPUT_POST, 'searchfordayusr');

if (!empty($searchfordayusr)) {
    $query = sprintf("SELECT i.name_investor, round (sum(m.total_installation), 2) as total  
FROM dbfinba.investor i inner join dbfinba.solar_nomenclature n
on i.id_sola_nomenclature = n.id_solar_nomenclature inner join dbfinba.investor_mesure m 
on i.number_investor = m.number_investor where n.school = '" . $_SESSION['Schoolsname'] . "' group by i.name_investor");
} else {
    //query to get data from the table
    $query = sprintf("SELECT i.name_investor, round (sum(m.total_installation), 2) as total  
FROM dbfinba.investor i inner join dbfinba.solar_nomenclature n
on i.id_sola_nomenclature = n.id_solar_nomenclature inner join dbfinba.investor_mesure m 
on i.number_investor = m.number_investor where n.school = '" . $_SESSION['Schoolsname'] . "' group by i.name_investor");
}
//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);


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

//query to get data from the table
$query = sprintf("SELECT n.school, round (sum(m.total_installation), 2) as total FROM dbfinba.solar_nomenclature n
inner join dbfinba.investor i on n.id_solar_nomenclature = i.id_sola_nomenclature inner join dbfinba.investor_mesure
 m on i.number_investor = m.number_investor group by n.school;");

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


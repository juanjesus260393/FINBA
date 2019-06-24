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
$year_actual = date('Y');

$mysqli->query("SET lc_time_names = 'es_ES'");
//query to get data from the table
$query = sprintf("select round(sum(m.total_installation),2) total, monthname(m.date_mesure) 
mes from dbfinba.investor i inner join dbfinba.solar_nomenclature s on i.id_sola_nomenclature = 
s.id_solar_nomenclature inner join dbfinba.investor_mesure m on i.number_investor = m.number_investor
where year(m.date_mesure) = $year_actual group by month(m.date_mesure)");

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


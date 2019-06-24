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
$hora_inicial = date('Y-m-d 00:00:00');
$dt = new DateTime($hora_inicial);
$hora_final = $dt->format("Y-m-d 24:59:00");
//query to get data from the table
$query = sprintf("select ifnull(round(sum(m.total_installation),2),0) total,s.school from dbfinba.investor i inner join 
dbfinba.solar_nomenclature s on i.id_sola_nomenclature = s.id_solar_nomenclature
inner join dbfinba.investor_mesure m on i.number_investor = m.number_investor
where m.date_mesure  >= '$hora_inicial'  and m.date_mesure <= '$hora_final' group by s.school");

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
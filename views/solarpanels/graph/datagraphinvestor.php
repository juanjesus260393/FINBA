<?php
//setting header to json
header('Content-Type: application/json');

//database
require_once('../../../models/mdlconection.php');

//get connection
$mysqli = mdlconection::connect();

if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
$query = sprintf("SELECT epikWh, epikWp FROM investor_mesure ORDER BY idinvestor_mesure");

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


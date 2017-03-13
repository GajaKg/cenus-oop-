<?php 
require_once("../../include/initialize.php");

global $c;

$q = "SELECT * FROM zaposleni";
$result = $c->query($q);

$row_array = array();

while($row = $c->fetch_assoc($result)){
    $row_array[] = $row;
}


echo json_encode($row_array);
?>
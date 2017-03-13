<?php
require_once("../../include/initialize.php");

global $c;

$q = "SELECT * FROM info";
$result = $c->query($q);

$object_array = array();

while($row = $c->fetch_assoc($result)){
    $object_array[] = $row;
}

echo json_encode($object_array);


?>
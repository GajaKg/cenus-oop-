<?php 
require_once("../include/initialize.php");


$id = $_GET['id'];

$infos = Info::find_all_infos_for($id);
foreach ($infos as $in){
    $in->delete();
}

$employee = Employee::find_by_id($id);
$employee->delete();

redirect_to("index.php");
?>
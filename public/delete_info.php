<?php 
require_once("../include/initialize.php");


$infoID = $_GET['infoId'];
$employeeID = $_GET['id'];

$infos = Info::find_info_for($infoID);
foreach ($infos as $in){
    $in->delete();
}


redirect_to("employee_info.php?id=".$employeeID);
?>
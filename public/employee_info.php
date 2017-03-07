<?php 
include("../include/hf/header.php");
require_once("../include/initialize.php");
$id = $_GET['id'];

echo Info::employee_info($id);
?>








<?php include("../include/hf/footer.php"); ?>
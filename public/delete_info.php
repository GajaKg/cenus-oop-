<?php 
require_once("../include/initialize.php");


$infoID = $_GET['infoId'] ;//var_dump($infoID);

$employeeID = $_GET['id'];//var_dump($employeeID);
// for redirect 
$whereToRedirect = empty($employeeID) ? null : "?id=".$employeeID;

$info = Info::find_by_id($infoID);//var_dump($infos);

if($info->delete()){
    $session->message("Uspesno ste izbrisali ugovor!");
    redirect_to("employee_info.php".$whereToRedirect);
} else {
    $session->message("Brisanje nije uspelo, kontaktirajte administratora!");
    redirect_to("employee_info.php".$whereToRedirect);
}

//redirect_to("employee_info.php?id=".$employeeID);
?>